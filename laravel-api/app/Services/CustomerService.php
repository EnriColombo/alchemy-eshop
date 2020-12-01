<?php


namespace App\Services;


use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerService
{
    /**
     * Return the customer object associated to auth user
     * @return Customer
     */
    public function getAuthCustomer()
    {
        $user = Auth::user();
        $customer = Customer::select()->where('user_id', $user->id)->firstOrFail();
        return $customer;
    }
}
