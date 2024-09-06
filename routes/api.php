<?php

use App\Http\Controllers\Api\AttributeController;
use App\Http\Controllers\Api\AttributeItemController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductVariantController;
use App\Http\Controllers\Api\TestImgController;
use App\Models\AttributeItem;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('attribute', AttributeController::class);
Route::resource('attributeitem', AttributeItemController::class);

Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::get('productvariantcreate/{id}',[ProductVariantController::class,'productvariantcreate'])->name('productvariantcreate');
Route::post('productvariantstore',[ProductVariantController::class,'productvariantstore'])->name('productvariantstore');
Route::apiResource('testimg',TestImgController::class);