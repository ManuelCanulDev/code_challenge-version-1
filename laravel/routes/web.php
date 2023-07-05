<?php

use App\Http\Controllers\Front\ClienteController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\OrderDetailController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\SupplierController;
use App\Http\Controllers\Front\SupplierProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('clientes', ClienteController::class)->middleware(['auth', 'verified']);

Route::resource('orders', OrderController::class)->middleware(['auth', 'verified']);

Route::resource('products',ProductController::class)->middleware(['auth', 'verified']);

Route::resource('orderDetails',OrderDetailController::class)->middleware(['auth', 'verified']);

Route::resource('suppliers',SupplierController::class)->middleware(['auth', 'verified']);

Route::resource('supplierProducts',SupplierProductController::class)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
