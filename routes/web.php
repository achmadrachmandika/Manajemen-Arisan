<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArisanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LaporanController;

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
    return view('auth.login');
});
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::get('register/produk', [RegisterController::class, 'showRegistrationForm'])->name('register_produk');

// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// routes/web.php
Route::get('register/pendaftaran', [RegisterController::class, 'showIdentityForm'])->name('register.identity');
Route::post('register/pendaftaran', [RegisterController::class, 'submitIdentity'])->name('register.identity.submit');

Route::get('register/product', [RegisterController::class, 'showProductForm'])->name('register.product');
Route::post('register/product', [RegisterController::class, 'submitProduct'])->name('register.product.submit');

Route::get('approved', function () {
    return view('approved');
})->name('approved');



// Routes that require authentication
Route::middleware('auth')->group(function () {

    // For Super Admin and Admin: Can access Dashboard and Produk
    Route::middleware(['role:super_admin|admin'])->group(function () {
        // Route untuk halaman daftar pengguna yang belum di-approve
// Route untuk menampilkan daftar pengguna yang belum di-approve
Route::get('admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');

// Route untuk melakukan approve pada pengguna
Route::delete('admin/users/{id}/delete', [AdminUserController::class, 'delete'])->name('admin.users.delete');
  Route::get('admin/approved-users', [AdminUserController::class, 'approvedUsers'])->name('admin.users.approved');
    Route::post('admin/approved-users/{user}/approve', [AdminUserController::class, 'approve'])->name('admin.users.approve');
    Route::post('/admin/update/payment/status', [AdminUserController::class, 'updatePaymentStatus'])->name('admin.update.payment.status');
  Route::get('/get-payment-details', [AdminUserController::class, 'getPaymentDetails']);

Route::get('/print-transaksi/{userId}', [IuranController::class, 'printTransaksi'])->name('print.transaksi');






// Route to approve a user (this should be a POST request)

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('produk', ProdukController::class);
        Route::resource('peserta', PesertaController::class);
        Route::resource('laporan', LaporanController::class);
    });

    // For Peserta: Can access Arisan
    Route::middleware(['role:peserta'])->group(function () {
        Route::get('/arisan', [ArisanController::class, 'index'])->name('arisan');
    });
});
// Auth routes (login, registration, etc.)
Auth::routes();


