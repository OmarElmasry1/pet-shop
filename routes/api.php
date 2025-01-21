<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductDetailController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::get('categories',[CategoryController::class,'show_categories']);
Route::get('products',[ProductController::class,'show_products']);
Route::get('productDetails',[ProductDetailController::class,'show_productDetails']);




Route::middleware('auth:sanctum')->group(function(){

    Route::group(['prefix'=>'user/'],function(){

        Route::get('profile', [UserController::class, 'get_profile']);
        Route::post('update-profile', [UserController::class, 'update_profile']);

    });


    Route::post('logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
});



