<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return redirect()->route('home');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'loginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth.manual'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Product - Semua User Bisa Melihat
    |--------------------------------------------------------------------------
    */

    Route::get('/product', [ProductController::class, 'index'])
        ->name('product');

    /*
    |--------------------------------------------------------------------------
    | Category - Semua User Bisa Melihat
    |--------------------------------------------------------------------------
    */

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    /*
    |--------------------------------------------------------------------------
    | Khusus Admin
    |--------------------------------------------------------------------------
    */

    Route::middleware(['role.admin'])->group(function () {

        // Product
        Route::get('/create', [ProductController::class, 'create'])
            ->name('product.create');

        Route::post('/store', [ProductController::class, 'store'])
            ->name('product.store');

        Route::get('/edit/{id}', [ProductController::class, 'edit'])
            ->name('product.edit');

        Route::post('/update/{id}', [ProductController::class, 'update'])
            ->name('product.update');

        Route::get('/delete/{id}', [ProductController::class, 'delete'])
            ->name('product.delete');

        // Category
        Route::resource('categories', CategoryController::class)
            ->except(['index']);
    });
});