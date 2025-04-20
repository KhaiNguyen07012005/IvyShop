<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Lấy tất cả sản phẩm
        $products = Product::all(); 
        
        // Truyền sản phẩm sang view
        return view('Home.home', compact('products'));
    }
}
