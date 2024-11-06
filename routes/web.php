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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/arisan', [ArisanController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/produk/index', [ProdukController::class, 'index'])->name('produk.index');