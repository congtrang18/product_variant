<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('attribute', AttributeController::class);
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::get('productvariantcreate/{id}',[ProductVariantController::class,'productvariantcreate'])->name('productvariantcreate');
Route::post('productvariantstore',[ProductVariantController::class,'productvariantstore'])->name('productvariantstore');




