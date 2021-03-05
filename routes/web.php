<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/products', function () {
    return view('products.index');
})->name('products.index');

Route::get('/products/create', function () {
    return view('products.create');
})->name('products.create');

Route::post('/products', function (Request $request) {
    $new_product = new Product;
    $new_product->description = $request->input('description');
    $new_product->price = $request->input('price');
    $new_product->save();
    return redirect()->route('products.index');
})->name('products.store');