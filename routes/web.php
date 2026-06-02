<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/insert', [ProductController::class, 'insert']);
Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::post('/update/{id}', [ProductController::class, 'update']);
Route::get('/delete/{id}', [ProductController::class, 'delete']);
Route::get('/create', [ProductController::class, 'create']);
Route::post('/store', [ProductController::class, 'store']);

Route::resource('categories', CategoryController::class);

Route::get('/', function () {
    return view('home');
})->name('home');