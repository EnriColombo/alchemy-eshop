<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartItemResource;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\CartItem;
use App\Services\CustomerService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return CartResource::collection(Cart::all());
    }

    /**
     * Crea un nuovo cart_item e, se non esiste il carrello, lo crea.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Prende il customer associato allo user autenticato
        $customer = $this->customerService->getAuthCustomer();
        try {
            // Prende il cart col customer_id
            $customerCart = Cart::select()->where([
                ['customer_id', $customer->id],
                ['purchased', false]
            ])->firstOrFail();
        } catch (ModelNotFoundException $e) {
            // Se non esiste crea un cart nuovo
            $customerCart = Cart::create([
                'customer_id' => $customer->id
            ]);
        }
        // Crea un nuovo cart_item con cart_id, product_id e quantity = 1
        $newCartItem = CartItem::create([
            'cart_id' => $customerCart->id,
            'product_id' => $request->id,
            'quantity' => 1

        ]);
        return new CartItemResource($newCartItem);
    }

    /**
     * Display the specified cart
     * of the authenticated user.
     *
     * @return CartResource
     */
    public function show()
    {
        $customer = $this->customerService->getAuthCustomer();
        try {
            $customerCart = Cart::select()->where([
                ['customer_id', $customer->id],
                ['purchased', false]
            ])->firstOrFail();
            return new CartResource($customerCart);
        } catch (ModelNotFoundException $e) {
            return response(['message' => 'Carrello vuoto.'], 404);
        }
    }

    /**
     * Aggiorna il carrello completo (in pratica le q.tà di ciascun item).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $input = $request->all();

        foreach ($cart->cartItems as $key=>$item) {
            $item->update($input['items'][$key]);
        }

        // return response
        $response = [
            'success' => true,
            'message' => 'Cart updated successfully.',
        ];
        return response()->json($response, 200);
    }

    /**
     * Rimuove un cart_item dal carrello e se questo è vuoto lo elimina.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        try {
            $cart = Cart::findOrFail($cartItem->cart_id);
            if ($cart->itemsCount() == 0) {
                $cart->delete();
            }
        } catch (ModelNotFoundException $e) {}
        // return response
        $response = [
            'success' => true,
            'message' => 'Item deleted successfully.',
        ];
        return response()->json($response, 200);
    }
}
