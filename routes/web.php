<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

// AUTH
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// PRODUCT
Route::get('/product/create', [ProductController::class, 'create'])->middleware('auth');
Route::post('/product/store', [ProductController::class, 'store'])->middleware('auth');

// HOME
Route::get('/', [ProductController::class, 'home']);

// FILTERS
Route::get('/category/{id}', [ProductController::class, 'categoryWise']);
Route::get('/city/{city}', [ProductController::class, 'cityWise']);

//  CITY + CATEGORY (missing fix)
Route::get('/filter/{city}/{category}', [ProductController::class, 'cityCategoryWise']);

//  LISTING PAGE (ALL PRODUCTS)
Route::get('/listing', [ProductController::class, 'listing']);