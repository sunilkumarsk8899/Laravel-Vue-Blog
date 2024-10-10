<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(CategoryRequest $request){
        $category = new Category();
        $category->name = $request->input('category');
        $category->slug = $request->input('category_slug');
        $category->save();
        return response()->json([
            'message' => 'Category created successfully'
        ], 200);
    }
}
