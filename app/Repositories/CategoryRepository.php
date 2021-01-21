<?php


namespace App\Repositories;


use App\Models\ProductCategory;

class CategoryRepository
{
    public function getAllProductCategories()
    {
        return ProductCategory::all();
    }

    public function create($categoryData)
    {
        return ProductCategory::create($categoryData);
    }

    public function findProductCategory($id)
    {
        return ProductCategory::findOrFail($id);
    }
}
