<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show_products() {
        $products = Product::paginate(10);

        return response()->json($products);
    }
}
