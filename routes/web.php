<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| FALLBACK LOGIN (WAJIB BIAR LARAVEL TIDAK ERROR)
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return redirect()->route('user.login');
})->name('login');

/*
|--------------------------------------------------------------------------
| USER AUTH
|--------------------------------------------------------------------------
*/
Route::prefix('auth')->name('user.')->group(function () {

    Route::get('/login', [AuthController::class, 'showUserLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'userLogin']);

    Route::get('/register', [AuthController::class, 'showUserRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'userRegister']);
});

/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/
Route::prefix('admin/auth')->name('admin.auth.')->group(function () {

    Route::get('/login', [AuthController::class, 'showAdminLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'adminLogin']);

    Route::get('/register', [AuthController::class, 'showAdminRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'adminRegister']);
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
    });

/*
|--------------------------------------------------------------------------
| USER AREA (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:user'])
    ->prefix('users')
    ->name('users.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('users.dashboard');
        })->name('dashboard');
    });