<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Frontoffice routes
Route::prefix('/home')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});


// Backoffice routes
Route::prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        '/users' => UserController::class,
        '/categories' => CategoryController::class,
    ], ['except' => ['show']]);
    Route::resource('/products', ProductController::class);
    Route::resource('/portfolios', PortfolioController::class);
});
