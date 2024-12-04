<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArisanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\AdminUserController;

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
        // Route untuk halaman daftar pengguna yang belum di-approve
Route::get('admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');

// Route untuk melakukan approve pada pengguna
Route::post('admin/approved-users', [AdminUserController::class, 'approvedUsers'])->name('admin.users.approved');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('produk', ProdukController::class);
        Route::resource('peserta', PesertaController::class);
    });

    // For Peserta: Can access Arisan
    Route::middleware(['role:peserta'])->group(function () {
        Route::get('/arisan', [ArisanController::class, 'index'])->name('arisan');
    });
});
// Auth routes (login, registration, etc.)
Auth::routes();


