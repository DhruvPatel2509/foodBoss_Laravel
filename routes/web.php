<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/categories', [CategoriesController::class, 'allCategories']);

Route::get('/admin/categories/create', function () {
    return view('admin.createCategories');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/loginProcess', [AuthController::class, 'loginProcess']);

Route::post('/admin/categories/create', [CategoriesController::class, 'createCategory']);
Route::get('/admin/categories/delete/{id}', [CategoriesController::class, 'deleteCategory']);
Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'editCategory']);
Route::post('/admin/categories/updateCat/{id}', [CategoriesController::class, 'updateCategory']);