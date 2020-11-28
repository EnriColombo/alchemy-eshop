<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartItemResource;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Prende il customer associato allo user autenticato
        $customer = $this->getAuthCustomer();
        try {
            // Prende il cart col customer_id (TODO escludere i carts già acquistati)
            $customerCart = Cart::select()->where('customer_id', $customer->id)->firstOrFail();
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
     * Display the specified resource
     * of the authenticated user.
     *
     * @return CartResource
     */
    public function show()
    {
        $customer = $this->getAuthCustomer();
        $customerCart = Cart::select()->where('customer_id', $customer->id)->firstOrFail();
        // TODO Aggiungere un flag sui carrelli acquistati per escluderli
        return new CartResource($customerCart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Return the customer object associated to auth user
     * @return Customer
     */
    private function getAuthCustomer()
    {
        $user = Auth::user();
        $customer = Customer::select('id')->where('user_id', $user->id)->firstOrFail();
        return $customer;
    }
}
