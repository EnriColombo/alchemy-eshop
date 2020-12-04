<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory(1)->create(); // Crea lo user 'admin'/'password'
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CustomerCategoriesTableSeeder::class);
    }
}
