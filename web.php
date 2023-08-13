<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


//Admin dashboard
Route::get('admin/index', [AdminController::class, 'dashboard'])->name('adminHome')->middleware('isLoggedIn');
Route::get('admin/login', [AdminController::class, 'login'])->name('adminLogin');
Route::post('admin/loginProcess', [AdminController::class, 'loginProcess'])->name('adminLoginProcess');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('adminLogout');

//admin management
Route::get('admin/add', [AdminController::class, 'adminAdd']);
Route::post('admin/addProcess', [AdminController::class, 'adminSave'])->name('adminSave');
Route::get('admin/list', [AdminController::class, 'adminList']);
Route::get('admin/edit/{id}', [AdminController::class, 'adminEdit']);
Route::post('admin/update', [AdminController::class, 'adminUpdate']);
Route::get('admin/delete/{id}', [AdminController::class, 'adminDelete']);

//Product
Route::get('admin/product-list', [AdminController::class, 'listProduct'])->middleware('isLoggedIn');
Route::get('admin/product-add', [AdminController::class, 'addProduct'])->middleware('isLoggedIn');
Route::post('admin/product-save', [AdminController::class, 'saveProduct'])->name('addProduct');
Route::get('admin/product-delete/{id}', [AdminController::class, 'deleteProduct']);
Route::get('admin/product-edit/{id}', [AdminController::class, 'editProduct']);
Route::post('admin/product-update', [AdminController::class, 'updateProduct']);

//Category
Route::get('admin/category-list', [AdminController::class, 'listCategory']);
Route::get('admin/category-add', [AdminController::class, 'addCategory']);
Route::post('admin/category-save', [AdminController::class, 'saveCategory'])->name('saveCategory');
Route::get('admin/category-edit/{id}', [AdminController::class, 'editCategory']);
Route::post('admin/category-update', [AdminController::class, 'categoryUpdate']);
Route::get('admin/category-delete/{id}', [AdminController::class, 'categoryDelete']);

//Customer dashboard
Route::get('customer/index', [CustomerController::class, 'index']);


//user login
Route::get('customer/login', [CustomerController::class, 'login']);
Route::post('customer/loginProcess', [CustomerController::class, 'loginProcess'])->name('loginProcess');
Route::get('customer/logout', [CustomerController::class, 'logOut']);


//user register
Route::get('customer/register', [CustomerController::class, 'register']);
Route::post('customer/registerProcess', [CustomerController::class, 'user_register_process'])->name('registerProcess');

//user data admin
Route::get('customer/list', [AdminController::class, 'userList'])->middleware('isLoggedIn');
Route::get('user-delete/{id}', [AdminController::class, 'userDelete']);
Route::get('user-edit/{id}', [AdminController::class, 'userEdit']);
Route::post('user-update', [AdminController::class, 'userUpdate']);






