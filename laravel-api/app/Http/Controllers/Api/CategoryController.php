<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoryResource;
use App\Models\ProductCategory;

class CategoryController extends Controller
{
    public function index()
    {
        return ProductCategoryResource::collection(ProductCategory::all());
    }
}
