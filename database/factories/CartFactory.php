<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $customer = Customer::where('customer_category_id', 3)
            ->inRandomOrder()
            ->first();
        return [
            'customer_id' => $customer->id,
            'purchased' => $this->faker->boolean(50)
        ];
    }
}
