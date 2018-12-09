<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\JobResource;
use App\Category;
use App\Job;

class CategoriesController extends Controller
{
    public function index(Category $category)
    {
        if(!$category) {
            $categories = Category::paginate(15);
            return CategoryResource::collection($categories);
        }
        return JobResource::collection($category->jobs);
    }
}
