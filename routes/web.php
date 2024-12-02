<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArisanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Public route
Route::get('/', function () {
    return view('arisan');
});

// Routes that require authentication
Route::middleware('auth')->group(function () {

    // For Super Admin and Admin: Can access Dashboard and Produk
    Route::middleware(['role:super_admin|admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('produk', ProdukController::class);
    });

    // For Peserta: Can access Arisan
    Route::middleware(['role:peserta'])->group(function () {
        Route::get('/arisan', [ArisanController::class, 'index'])->name('arisan');
    });
});
// Auth routes (login, registration, etc.)
Auth::routes();


