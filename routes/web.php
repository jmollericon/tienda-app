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

Route::middleware('auth')->group(function () {
    Route::get('/products', function () {
        $products = Product::orderBy('created_at', 'desc')->get(); # all();
        return view('products.index', compact('products'));
    })->name('products.index');

    Route::get('/products/create', function () {
        return view('products.create');
    })->name('products.create');

    Route::post('/products', function (Request $request) {
        $new_product = new Product;
        $new_product->description = $request->input('description');
        $new_product->price = $request->input('price');
        $new_product->save();
        return redirect()->route('products.index')->with('info', 'Product created successfully');
    })->name('products.store');

    Route::delete('/products/{id}', function ($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('info', 'Product deleted successfully');
    })->name('products.destroy');

    Route::get('/products/{id}/edit', function ($id) {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    })->name('products.edit');

    Route::put('/products/{id}', function (Request $req, $id) {
        $product = Product::findOrFail($id);
        $product->description = $req->input('description');
        $product->price = $req->input('price');
        $product->save();
        return redirect()->route('products.index')->with('info', 'Product updated successfully');
    })->name('products.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
