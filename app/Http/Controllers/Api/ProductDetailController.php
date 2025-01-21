<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductDetailsRequest;
use App\Models\ProductDetail;

class ProductDetailController extends Controller
{

    public function show_productDetails(ProductDetailsRequest $request) {

        $product_id = $request->validated()['product_id'];

        $productDetails = ProductDetail::findOrFail($product_id);

        return response()->json($productDetails);
    }






}
