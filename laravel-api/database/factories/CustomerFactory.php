<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\CustomerCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::where('role_id', 0)
                    ->inRandomOrder()
                    ->first();
        return [
            'user_id' => $user->id,
            'username' => $user->name,
            'email' => $user->email,
            'customer_category_id' => CustomerCategory::inRandomOrder()->first()->id,
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'address' => $this->faker->address,
            'shipping_address' => $this->faker->address,
            'zip' => $this->faker->randomNumber(5),
            'city' => $this->faker->city,
            'country' => $this->faker->country
        ];
    }
}
