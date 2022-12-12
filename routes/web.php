<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RegisterUserController;
use App\Http\Controllers\Backend\SuratKeluarController;
use App\Http\Controllers\Backend\SuratMasukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (!Auth::check()) {
        return view('auth.login');
    }
    return redirect(url('/dashboard'));
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // Register
        Route::get('/register', [RegisterUserController::class, 'index'])->name('register');
        Route::get('/profile', [RegisterUserController::class, 'profile'])->name('profile');
        // Surat Masuk
        Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk');
        // Surat Keluar
        Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])->name('surat-keluar');
    });
});
