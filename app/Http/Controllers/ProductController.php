<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        
        $products = Product::with([])->get();

        return view('products.products')->with([
            'products' => $products,
        ]);
    }
}
