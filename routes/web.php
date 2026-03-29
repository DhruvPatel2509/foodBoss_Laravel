<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

// --- Public & Auth ---
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/loginProcess', [AuthController::class, 'loginProcess']);


// --- Admin Dashboard ---
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});


// --- Categories Management ---
Route::get('/admin/categories', [CategoriesController::class, 'allCategories']);

Route::get('/admin/categories/create', function () {
    return view('admin.createCategories');
});

Route::post('/admin/categories/store', [CategoriesController::class, 'store']);

Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'editCategory']);

Route::post('/admin/categories/updateCat/{id}', [CategoriesController::class, 'updateCategory']);

Route::get('/admin/categories/delete/{id}', [CategoriesController::class, 'deleteCategory']);


// --- Products Management ---
Route::get('/admin/products', [ProductsController::class, 'allProducts']);

Route::get('/admin/products/create', [ProductsController::class, 'create']);

Route::post('/admin/products/store', [ProductsController::class, 'store']);

Route::get('/admin/products/delete/{id}', [ProductsController::class, 'deleteProduct']);

Route::get('/admin/products/edit/{id}', [ProductsController::class, 'editProduct']);

Route::post('/admin/products/update/{id}', [ProductsController::class, 'updateProduct']);

// --- Orders Management ---

Route::get('/admin/orders', [OrdersController::class, 'allOrders']);

Route::get('/admin/viewOrder{id}', [OrdersController::class, 'viewOrder']);