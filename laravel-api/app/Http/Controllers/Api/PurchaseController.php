<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Purchase;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = $this->customerService->getAuthCustomer();
        // Update Customer data
        $customer->email = $request->customer['email'];
        $customer->shipping_address = $request->customer['shippingaddress'];
        // TODO aggiungere gli altri campi
        $customer->save();
        // Customer's cart
        $cart = Cart::select()->where([
            ['customer_id', $customer->id],
            ['purchased', false]
        ])->firstOrFail();
        // Create a new Purchase
        Purchase::create([
            'cart_id' => $cart->id,
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'total' => $cart->cartTotal()
            // TODO aggiungere dati metodo di pagamento
        ]);
        // Set flag 'purchased' on Cart
        $cart->purchased = true;
        $cart->save();
        return response()->json(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
