<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
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
// categories
Route::get('/category', [PageController::class, 'category']);
Route::get('/category/{slug}', [PageController::class, 'categoryDetail']);
// products
Route::get('/product', [PageController::class, 'product']);
Route::get('/product/{slug}', [PageController::class, 'productDetail']);
// portfolios
Route::get('/portfolio', [PageController::class, 'portfolio']);
// designers
Route::get('/designer', [PageController::class, 'designer']);
Route::get('/contact', [PageController::class, 'contact']);

// Cart routes
Route::prefix('/cart')->group(function () {
    Route::get('/', [CartController::class, 'showCart'])->name('cart');
    Route::post('/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/update', [CartController::class, 'updateCartQty']);
    Route::delete('/delete/{id}', [CartController::class, 'removeCartItem'])->name('cart.delete');
});

// Wishlist routes
Route::prefix('/wishlist')->group(function () {
    Route::get('/', [WishlistController::class, 'showWishlist'])->name('wishlist');
    Route::post('/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::delete('/delete/{id}', [WishlistController::class, 'deleteWishlist'])->name('wishlist.delete');
});

// Setting routes
Route::prefix('/setting')->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::patch('/profile', [ProfileController::class, 'changePassword'])->name('profile.password');
});

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
