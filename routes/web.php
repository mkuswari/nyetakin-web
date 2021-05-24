<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
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

// Authentications routes
Auth::routes();

// Global routes
Route::get('/', [PageController::class, 'index']);
Route::get('/category', [PageController::class, 'category']);
Route::get('/product', [PageController::class, 'product']);
Route::get('/portfolio', [PageController::class, 'portfolio']);
Route::get('/designer', [PageController::class, 'designer']);
Route::get('/about', [PageController::class, 'about']);

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
        '/portfolios' => PortfolioController::class,
    ], ['except' => ['show']]);
    Route::resource('/products', ProductController::class);
});
