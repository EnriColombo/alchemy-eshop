<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'product_category_id' => ProductCategory::inRandomOrder()->first()->id,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 0, 500)
        ];
    }
}
