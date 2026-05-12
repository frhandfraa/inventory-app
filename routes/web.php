<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::resource('products', ProductController::class)->except(['index', 'show']);

// Legacy auto routes (keep for backward compatibility)
Route::get('insert', [ProductController::class, 'insert']);
Route::get('update/{id?}', [ProductController::class, 'updateLegacy']);
Route::get('delete/{id?}', [ProductController::class, 'delete']);
