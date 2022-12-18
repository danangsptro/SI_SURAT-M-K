<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\IndexSuratController;
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
        // Index Surat
        Route::get('/index-surat', [IndexSuratController::class, 'index'])->name('index-surat');
        Route::get('/create-surat', [IndexSuratController::class, 'create'])->name('create-surat');
        Route::post('/store-surat', [IndexSuratController::class, 'store'])->name('store-surat');
        Route::get('/edit-surat-index/{id}', [IndexSuratController::class, 'edit'])->name('edit-surat');
        Route::put('/update-surat-index/{id}', [IndexSuratController::class, 'update'])->name('update-surat');
        Route::delete('/delete-surat/{id}', [IndexSuratController::class, 'destroy'])->name('delete-index-surat');
        // Register
        Route::get('/register', [RegisterUserController::class, 'index'])->name('register');
        Route::post('/edit-profile/{id}', [RegisterUserController::class, 'editProfile'])->name('edit-profile');
        Route::post('/update-password/{id}', [RegisterUserController::class, 'updatePassword'])->name('update-password');
        Route::get('/profile', [RegisterUserController::class, 'profile'])->name('profile');
        Route::post('/create-user', [RegisterUserController::class, 'store'])->name('store-user');
        Route::delete('/delete-user/{id}', [RegisterUserController::class, 'deleteUser'])->name('delete-user');
        // Surat Masuk
        Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk');
        // Surat Keluar
        Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])->name('surat-keluar');
    });
});
