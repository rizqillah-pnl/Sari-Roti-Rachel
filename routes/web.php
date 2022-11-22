<?php

use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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
})->name('/');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Produk
Route::get('/produk', [ProductController::class, 'index'])->name('produk');
Route::get('/sunday', [ProductController::class, 'sunday'])->name('sunday');

// Login With Google
Route::get('auth/googlelogin', [LoginWithGoogleController::class, 'redirectToGoogle'])->name('redirecttogoogle');
Route::get('auth/googlelogin/callback', [LoginWithGoogleController::class, 'handleGoogleCallback'])->name('handlegooglecallback');

// Admin
Route::get('/admin/produk', [AdminProductController::class, 'index'])->name('admin.produk');

// Pengguna
Route::get('/admin/pengguna', [AdminUserController::class, 'index'])->name('admin.pengguna');

// Customer
Route::get('/admin/pelanggan', [AdminCustomerController::class, 'index'])->name('admin.customer');

require __DIR__.'/auth.php';
