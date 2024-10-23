<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_products(){
        $products = Product::all();
        return response()->json([
            'products' => $products
        ]);
    }

    public function add_products(Request $request){
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();

    }
}
