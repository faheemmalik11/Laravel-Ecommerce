<?php

use App\Http\Controllers\CartController;
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
    Route::get('/home', [HomeController::class, 'index'] )->name('home');
    Route::get('/home/{category}', [HomeController::class, 'show_category'] )->name('category.single');
    

    Route::get('/user/{user}/profile', [UserController::class, 'show'] )->name('user.profile');
    Route::post('/user/{user}/update', [UserController::class, 'update'] )->name('user.profile.update');
    
   



    

    Route::get('/product/index', [ProductController::class, 'index'] )->name('product.index');
    Route::post('/product/{product}/delete', [ProductController::class, 'delete'] )->name('product.delete');
    Route::post('/product/create', [ProductController::class, 'create'] )->name('product.create');
    Route::get('/product/{product}/show', [ProductController::class, 'show'] )->name('product.show');
    Route::post('/product/{product}/update', [ProductController::class, 'update'] )->name('product.update');

    Route::get('/cart/{product}/add', [CartController::class, 'add'] )->name('cart.add');
    Route::get('/cart/show', [CartController::class, 'show'] )->name('cart.show');
    Route::get('/cart/{product}/remove', [CartController::class, 'remove'] )->name('cart.remove');


    
});

Route::middleware(['jwt.verify','superAdminChecker'])->group(function () {
    
    Route::get('/user/register', [UserController::class, 'register'] )->name('user.register');
    Route::post('/user/{user}/delete', [UserController::class, 'delete'] )->name('user.delete');
    Route::get('/user/dashboard', [UserController::class, 'dashboard'] )->name('user.dashboard');
    Route::get('/user/index', [UserController::class, 'index'] )->name('user.index');
    Route::post('/user/create', [UserController::class, 'create'] )->name('user.create');

    Route::get('/category/index', [CategoryController::class, 'index'] )->name('category.index');
    Route::post('/category/{category}/delete', [CategoryController::class, 'delete'] )->name('category.delete');
    Route::post('/category/create', [CategoryController::class, 'create'] )->name('category.create');
    Route::get('/category/{category}/show', [CategoryController::class, 'show'] )->name('category.show');
    Route::post('/category/{category}/update', [CategoryController::class, 'update'] )->name('category.update');


    Route::get('/roles/index', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');    
    Route::get('/permissions/index', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');  
    
    Route::post('/roles/{role}/delete', [App\Http\Controllers\RoleController::class, 'delete'])->name('role.delete');    
    Route::post('/permissions/{permission}/delete', [App\Http\Controllers\PermissionController::class, 'delete'])->name('permission.delete');    

    Route::post('/roles/add', [App\Http\Controllers\RoleController::class, 'store'])->name('role.add');    
    Route::post('/permissions/add', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.add'); 

    Route::get('/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'show'])->name('role.edit');    
    Route::get('/permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'show'])->name('permission.edit'); 

    Route::post('/roles/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update');    
    Route::post('/permissions/{permission}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');

    Route::post('/roles/{role}/permission/attach', [App\Http\Controllers\RoleController::class, 'attach'])->name('role.permission.attach');
    Route::post('/roles/{role}/permission/detach', [App\Http\Controllers\RoleController::class, 'detach'])->name('role.permission.detach');
});


 
