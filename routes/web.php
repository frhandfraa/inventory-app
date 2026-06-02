<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryController::class);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::resource('products', ProductController::class)->except(['index', 'show']);

// Legacy auto routes (keep for backward compatibility)
Route::get('insert', [ProductController::class, 'insert']);
Route::get('update/{id?}', [ProductController::class, 'updateLegacy']);
Route::get('delete/{id?}', [ProductController::class, 'delete']);
