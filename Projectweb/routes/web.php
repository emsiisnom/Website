<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('product-list', [ProductController::class, 'index']);
Route::get('product-add', [ProductController::class, 'add']);
Route::post('product-save', [ProductController::class, 'save']);
Route::get('product-delete/{id}', [ProductController::class, 'delete']);
Route::get('product-edit/{id}', [ProductController::class, 'edit']);
Route::post('product-update', [ProductController::class, 'update']);

// admin dashboard
Route::get('admin/index', [AdminController::class, 'dashboard'])->name('adminHome');
Route::get('admin/login', [AdminController::class, 'login'])->name('adminLogin');
Route::post('admin/loginProcess', [AdminController::class, 'loginProcess'])->name('adminLoginProcess');
Route::post('admin/logout', [AdminController::class, 'logout'])->name('adminLogout');

Route::get('admin/product-list', [AdminController::class, 'list']);//->middleware('isLoggedIn');
Route::get('admin/product-add', [AdminController::class, 'add']);//->middleware('isLoggedIn');
Route::post('admin/product-save', [AdminController::class, 'save']);