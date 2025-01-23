<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\Api\ProductDetailsRequest;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;


class ProductController extends Controller
{
    use ApiResponse;
    public function show_products() {
        $products = Product::paginate(10);

        return $this->returnData('products', $products,'',200);
    }

    public function show_productDetails(ProductDetailsRequest $request) {

        $productDetails = Product::findOrFail($request->product_id);

        return $this->returnData('productDetails', $productDetails,'',200);
    }

}
