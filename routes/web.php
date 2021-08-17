<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\TerminController;
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
// cetak pas foto route
Route::get('/majors/{faculty_id}', [MainController::class, 'getMajors']);
Route::get('/cetak-pasfoto', [PageController::class, 'cetakPasFoto']);
Route::get('/cetak-pasfoto/upload', [MainController::class, 'uploadPasFoto']);
// portfolios
Route::get('/portfolio', [PageController::class, 'portfolio']);
Route::get('/portfolio/{slug}', [PageController::class, 'portfolioDetail']);
// designers
Route::get('/designer', [PageController::class, 'designer']);
Route::get('/contact', [PageController::class, 'contact']);

// Route untuk Rajaongkir dan Checkout
Route::get('/cities/{province_id}', [CheckoutController::class, 'getCities']);
Route::post('/cek-ongkir', [CheckoutController::class, 'getCost'])->name('cek-ongkir');

// Add Reviews Product routes
Route::post("/add-review", [MainController::class, "addReview"])->name("add-review");

// Checkout routes
Route::prefix('/checkout')->group(function () {
    Route::post('/', [CheckoutController::class, 'checkoutAction'])->name('checkout');
    Route::get('/overview/{id}', [CheckoutController::class, 'checkoutOverview'])->name('checkout.overview');
    Route::post('/payment', [CheckoutController::class, 'checkoutConfirmation'])->name('checkout.payment');
    Route::get('/success', [CheckoutController::class, 'checkoutSuccess'])->name('checkout.success');
});

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

Route::prefix('/checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'checkoutPage'])->name('checkout');
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
    Route::get('/orders', [HomeController::class, 'myOrder'])->name('home.order');
    Route::get('/orders/detail/{id}', [HomeController::class, 'detailOrder'])->name('home.order.detail');
});


// Backoffice routes
Route::prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        '/users' => UserController::class,
        '/categories' => CategoryController::class,
        '/portfolios' => PortfolioController::class,
        '/termins' => TerminController::class,
    ], ['except' => ['show']]);
    Route::resource('/products', ProductController::class);
    Route::resource('/orders', OrderController::class)->except('create', 'store');
    Route::resource('/reviews', ReviewController::class)->except('create', 'store', 'edit', 'update', 'show');
    Route::resource('/shippings', ShippingController::class)->except('edit', 'update');
    Route::resource('/payments', PaymentController::class)->except('create', 'store', 'edit', 'update', 'show', 'destroy');
    Route::resource('/photos', PhotoController::class);
    Route::get('/shipping/create/{id}', [ShippingController::class, 'create'])->name('shipping.create');

    // Route untuk pengaturan website
    Route::get('/setting', [SettingController::class, 'showSetting'])->name('setting');
    Route::get('/setting/update/{id}', [SettingController::Class, 'updateSetting'])->name('setting.update');
    Route::put('/setting/update/{id}', [SettingController::Class, 'storeUpdateSetting'])->name('setting.update');
});
