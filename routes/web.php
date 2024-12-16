<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');

Route::prefix('admin')->group(function () {
    // Login dan Register Routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Password Reset Routes
    Route::get('/password/reset', [AdminAuthController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/password/email', [AdminAuthController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('/password/reset/{token}', [AdminAuthController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('/password/reset', [AdminAuthController::class, 'reset'])->name('admin.password.update');

    // Dashboard Route (protected by middleware)
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    });
});

// Rute Transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.form');
Route::get('transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('transaksi.edit');
Route::put('transaksi/update/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::delete('/transaksi/delete/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy'); // Tetap gunakan no
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

Route::get('/laporan', [LaporanController::class, 'index'])->name('report');
