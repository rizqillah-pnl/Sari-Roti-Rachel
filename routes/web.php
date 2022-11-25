<?php

use App\Http\Controllers\AdminCartController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Models\Product;
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
    return view('welcome',[
        "products" => Product::all()
    ]);
})->name('/');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Produk
Route::get('/produk', [ProductController::class, 'index'])->name('produk');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('produk.show');
Route::get('/sunday', [ProductController::class, 'sunday'])->name('sunday');

// Login With Google
Route::get('auth/googlelogin', [LoginWithGoogleController::class, 'redirectToGoogle'])->name('redirecttogoogle');
Route::get('auth/googlelogin/callback', [LoginWithGoogleController::class, 'handleGoogleCallback'])->name('handlegooglecallback');

// Admin Product
Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.produk');
Route::get('/admin/products/{id}', [AdminProductController::class, 'show'])->name('admin.product.show');

// Admin Order
Route::post('/admin/orders/{product}', [AdminOrderController::class, 'store'])->name('admin.orders.store');
Route::delete('/admin/orders/{order}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');

// Admin Cart
Route::get('/admin/cart', [AdminCartController::class,'index'])->name('admin.cart');

// Checkout
Route::post('/admin/checkout', [AdminOrderController::class, 'checkout'])->name('admin.checkout');

// Admin Histories
Route::get('/admin/history', [AdminOrderController::class, 'index'])->name('admin.history');

// Admin Customers
Route::get('/admin/pengguna', [AdminUserController::class, 'index'])->name('admin.pengguna');
Route::delete('/admin/customers/{id}', [AdminUserController::class, 'destor'])->name('admin.customers.destroy');

// Admin Report
Route::get('/admin/report', [ReportController::class, 'index'])->name('admin.report');

// Admin Customer
Route::get('/admin/pelanggan', [AdminCustomerController::class, 'index'])->name('admin.customer');

// Customer History
Route::get('history', [HistoryController::class, 'index'])->name('history');

require __DIR__.'/auth.php';
