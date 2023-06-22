<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware(['guest']);





Route::middleware(['jwt.verify'])->group(function () {
    Route::get('/home', [HomeController::class, 'check'] )->name('home');
    Route::get('/user/{user}/profile', [UserController::class, 'show'] )->name('user.profile');
    Route::post('/user/{user}/update', [UserController::class, 'update'] )->name('user.profile.update');


    Route::get('/category/index', [CategoryController::class, 'index'] )->name('category.index');
    Route::post('/category/{category}/delete', [CategoryController::class, 'delete'] )->name('category.delete');
    Route::post('/category/create', [CategoryController::class, 'create'] )->name('category.create');
    Route::get('/category/{category}/show', [CategoryController::class, 'show'] )->name('category.show');
    Route::post('/category/{category}/update', [CategoryController::class, 'update'] )->name('category.update');

    Route::get('/product/index', [ProductController::class, 'index'] )->name('product.index');
    Route::post('/product/{product}/delete', [ProductController::class, 'delete'] )->name('product.delete');
    Route::post('/product/create', [ProductController::class, 'create'] )->name('product.create');
    Route::get('/product/{product}/show', [ProductController::class, 'show'] )->name('product.show');
    Route::post('/product/{product}/update', [ProductController::class, 'update'] )->name('product.update');
});


 
