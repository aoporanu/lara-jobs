<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return CategoryResource::collection($categories);
    }
}
