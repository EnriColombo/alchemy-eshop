<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Purchase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cart = Cart::where('purchased', 1)
            ->inRandomOrder()
            ->first();
        return [
            'cart_id' => $cart->id,
            'date' => $this->faker->dateTimeThisMonth,
            'total' => $this->faker->randomFloat(2, 0, 500),
            'method' => $this->faker->randomElement(['credit', 'debit', 'paypal']),
            'cardname' => $this->faker->name,
            'cardnumber' => $this->faker->creditCardNumber,
            'cardexpiration' => $this->faker->creditCardExpirationDate,
            'cardcvv' => $this->faker->randomNumber(3)
        ];
    }
}
