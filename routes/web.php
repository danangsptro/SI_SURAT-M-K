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
        Route::get('/edit-account-user/{id}', [RegisterUserController::class, 'editAccountUser'])->name('edit-account-user');
        // Surat Masuk
        Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk');
        Route::get('/surat-masuk-create', [SuratMasukController::class, 'create'])->name('surat-masuk-create');
        Route::post('/surat-masuk-store', [SuratMasukController::class, 'store'])->name('surat-masuk-store');
        Route::delete('/surat-masuk-delete/{id}', [SuratMasukController::class, 'destroy'])->name('surat-masuk-delete');
        Route::get('/surat-masuk-edit/{id}', [SuratMasukController::class, 'edit'])->name('surat-masuk-edit');
        Route::post('/surat-masuk-update/{id}', [SuratMasukController::class, 'update'])->name('surat-masuk-update');
        Route::get('/surat-masuk-detail/{id}', [SuratMasukController::class, 'show'])->name('surat-masuk-show');
        // Surat Keluar
        Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])->name('surat-keluar');
        Route::get('/surat-keluar-create', [SuratKeluarController::class, 'create'])->name('surat-keluar-create');
        Route::post('/surat-keluar-store', [SuratKeluarController::class, 'store'])->name('surat-keluar-store');
        Route::delete('/surat-keluar-delete/{id}', [SuratKeluarController::class, 'destroy'])->name('surat-keluar-delete');
        Route::get('/surat-keluar-edit/{id}', [SuratKeluarController::class, 'edit'])->name('surat-keluar-edit');
        Route::get('/surat-keluar-detail/{id}', [SuratKeluarController::class, 'show'])->name('surat-keluar-show');
        Route::post('/surat-keluar-update/{id}', [SuratKeluarController::class, 'update'])->name('surat-keluar-update');
    });
});
