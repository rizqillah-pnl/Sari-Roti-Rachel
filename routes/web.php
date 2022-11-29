<?php

use App\Http\Controllers\AdminCartController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminHistoryController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminReportController;
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
Route::get('/product/{id}', [ProductController::class, 'show'])->name('produk.show');
Route::get('/sunday', [ProductController::class, 'sunday'])->name('sunday');


// History
Route::get('history', [HistoryController::class, 'index'])->name('history');
Route::get('history/{order}', [OrderController::class, 'show'])->name('history.show');

// Profile
ROute::get('profile/{user}', [ProfileController::class, 'show'])->name('profile');

// Login With Google
Route::get('auth/googlelogin', [LoginWithGoogleController::class, 'redirectToGoogle'])->name('redirecttogoogle');
Route::get('auth/googlelogin/callback', [LoginWithGoogleController::class, 'handleGoogleCallback'])->name('handlegooglecallback');

// Admin Product
Route::get('admin/product', [AdminProductController::class, 'index'])->name('admin.products');
Route::get('admin/product/create', [AdminProductController::class, 'create'])->name('admin.products.create');
Route::post('admin/product/store', [AdminProductController::class, 'store'])->name('admin.products.store');
Route::get('admin/product/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
Route::put('admin/product/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
Route::delete('admin/product/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

// Admin Order
Route::post('/admin/order/{product}', [AdminOrderController::class, 'store'])->name('admin.orders.store');
Route::get('admin/order/{product}', [AdminOrderController::class, 'show'])->name('admin.products.show');
Route::get('/admin/order/', [AdminOrderController::class, 'index'])->name('admin.orders');
Route::delete('/admin/order/{order}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');

// Admin Historu
Route::get('admin/history', [AdminHistoryController::class, 'index'])->name('admin.history');
Route::get('/admin/history/{orderdetail}', [AdminHistoryController::class, 'show'])->name('admin.history.show');

// Admin Cart
Route::get('/admin/cart', [AdminCartController::class,'index'])->name('admin.cart');

// Admin Checkout
Route::post('/admin/checkout', [AdminOrderController::class, 'checkout'])->name('admin.checkout');

// Admin User
Route::get('/admin/user/', [AdminUserController::class, 'index'])->name('admin.user');

// Admin Report
Route::get('/admin/report', [AdminReportController::class, 'index'])->name('admin.report');

// Admin Customer
Route::get('/admin/customers', [AdminCustomerController::class, 'index'])->name('admin.customers');
Route::delete('/admin/customers/{id}', [AdminUserController::class, 'destroy'])->name('admin.customers.destroy');


require __DIR__.'/auth.php';
