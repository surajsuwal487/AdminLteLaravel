<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;

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



//categories
Route::get('categories', [CategoriesController::class, 'index']);
Route::get('add-category', [CategoriesController::class, 'create']);
Route::post('add-category', [CategoriesController::class, 'store']);
Route::get('edit-category/{id}', [CategoriesController::class, 'edit']);
Route::put('update-category/{id}', [CategoriesController::class, 'update']);
Route::get('delete-category/{id}', [CategoriesController::class, 'destory']);



//Products
Route::get('products', [ProductsController::class, 'index']);
Route::get('add-product', [ProductsController::class, 'create']);
Route::post('add-product', [ProductsController::class, 'store']);
Route::get('edit-product/{id}', [ProductsController::class, 'edit']);
Route::put('update-product/{id}', [ProductsController::class, 'update']);
Route::get('delete-product/{id}', [ProductsController::class, 'destory']);
Route::get('search', [ProductsController::class, 'search']);




// Route::get('/products', function () {
//     return view('products.index');
// });

// Route::get('/products/create', function () {
//     return view('products.create');
// });

// Route::get('/products/edit', function () {
//     return view('products.edit');
// });
