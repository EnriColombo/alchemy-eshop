<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CustomerCategoriesTableSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(CartItemSeeder::class);
        $this->call(PurchaseSeeder::class);
    }
}
