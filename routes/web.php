<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MitraController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/report', [PageController::class, 'report'])->name('report');
Route::get('/form/mitra', [PageController::class, 'formMitra'])->name('form_mitra');
Route::get('/form/nonmitra', [PageController::class, 'formNonMitra'])->name('form_nonmitra');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/mitra', [DashboardController::class, 'mitra'])->name('dashboard.mitra');
Route::get('/dashboard/transaksi', [DashboardController::class, 'transaksi'])->name('dashboard.transaksi');
Route::get('/dashboard/pelaporan', [DashboardController::class, 'pelaporan'])->name('dashboard.pelaporan');

// Routes untuk Admin Auth
Route::prefix('admin')->group(function () {
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register']);

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard.index');
        })->name('dashboard.index');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });
});

// Route untuk halaman utama transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
// Route untuk form transaksi
Route::get('/transaksi/form', [TransaksiController::class, 'showForm'])->name('transaksi.form');
// Route untuk menyimpan transaksi
Route::post('/transaksi/store', [TransaksiController::class, 'storeTransaction'])->name('transaksi.store');

Route::get('/mitra/create', [MitraController::class, 'create'])->name('mitra.create');
Route::post('/mitra/store', [MitraController::class, 'store'])->name('mitra.store');



