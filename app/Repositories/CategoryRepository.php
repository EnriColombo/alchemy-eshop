<?php


namespace App\Repositories;


use App\Models\ProductCategory;

class CategoryRepository
{
    public function create($categoryData)
    {
        return ProductCategory::create($categoryData);
    }
}
