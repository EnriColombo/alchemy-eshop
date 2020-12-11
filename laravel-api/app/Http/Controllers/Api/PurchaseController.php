<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseResource;
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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PurchaseResource::collection(Purchase::paginate(10));
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
        $customer->shipping_address = $request->customer['shipping_address'];
        $customer->customer_category_id = 2; // 'Contatto'
        $customer->firstname = $request->customer['firstname'];
        $customer->lastname = $request->customer['lastname'];
        $customer->address = $request->customer['address'];
        $customer->zip = $request->customer['zip'];
        $customer->city = $request->customer['city'];
        $customer->country = $request->customer['country'];
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
            'total' => $cart->cartTotal(),
            'method' => $request->payment['method'],
            'cardname' => $request->payment['cardname'],
            'cardnumber' => $request->payment['cardnumber'],
            'cardexpiration' => Carbon::createFromFormat('Y-m-d', $request->payment['cardexpiration']),
            'cardcvv' => $request->payment['cardcvv']
        ]);
        // Set flag 'purchased' on Cart
        $cart->purchased = true;
        $cart->save();
        // Set customer category id to 3 ('Cliente')
        $customer->customer_category_id = 3;
        $customer->save();
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
