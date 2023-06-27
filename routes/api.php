<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('logPost');
Route::get('/logout', function(){

        setcookie('credentials', '', time() - 24*60*60*60, '/');
        sleep(2);
        return redirect()->route('login');
})->name('logout');
Route::get('/user', [AuthController::class, 'getUser']);

// Route::middleware('jwt.verify')->group(function() {
//     Route::get('/dashboard', function() {
//         return response()->json(['message' => 'Welcome to dashboard'], 200);
//     });
// });

// Route::get('/home', [HomeController::class, 'check'] )->name('home');




