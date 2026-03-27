<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/categories', function () {
    return view('admin.categories');
});

Route::get('/admin/categories/create', function () {
    return view('admin.createCategories');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/loginProcess', [AuthController::class, 'loginProcess']);