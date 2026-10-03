<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.home');
Route::post('/kontak', [PortfolioController::class, 'sendMessage'])->name('portfolio.contact');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store'])->middleware('throttle:5,1')->name('login.store');
    Route::post('/logout', [AuthController::class, 'destroy'])->middleware('portfolio.admin')->name('logout');

    Route::middleware('portfolio.admin')->group(function () {
        Route::get('/', fn () => redirect()->route('admin.certificates.index'))->name('dashboard');
        Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
        Route::post('/certificates', [CertificateController::class, 'store'])->name('certificates.store');
        Route::put('/certificates/{certificate}', [CertificateController::class, 'update'])->name('certificates.update');
        Route::delete('/certificates/{certificate}', [CertificateController::class, 'destroy'])->name('certificates.destroy');
    });
});
