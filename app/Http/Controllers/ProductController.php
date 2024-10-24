<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function get_products(){
        $products = Product::with('category')->get();
        return response()->json([
            'products' => $products
        ]);
    }

    public function add_products(Request $request){
        $request->validate([
            'title' => 'required|string|unique:products,name',
            'desc' => 'required|string',
            'published_date' => 'required|date',
            'cat_id' => 'required|integer',
            // 'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            // Check if product already has an image and delete it
            if ($product->image && File::exists(public_path('images/'.$product->image))) {
                File::delete(public_path('images/'.$product->image));
            }
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'default.png'; // or handle the case when there's no image
        }

        $product->name = $request->input('title');
        $product->desc = $request->input('desc');
        $product->image = $imageName;
        $product->published_date = $request->input('published_date');
        $product->category_id = $request->input('cat_id');
        $product->status = $request->input('status');
        $res = $product->save();



        return response()->json([
            'resp' => $res,
            'requestData' => $request->all(),
            'message' => "Add Product Successfully",
            'status' => true,
        ], 200);
    }

}
