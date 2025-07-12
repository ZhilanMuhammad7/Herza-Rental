<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\VerifikasiStatus;
use App\Http\Controllers\LokasiController;

Route::get('/masterUser', [MasterController::class, 'indexUser'])->name('masterUser.indexUser');
Route::get('/masterAdmin', [MasterController::class, 'indexAdmin'])->name('masterAdmin.indexAdmin');

Route::prefix('/')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('landingPage.index');
    Route::get('/mobil', [LandingPageController::class, 'mobil'])->name('landingPage.mobil');
    Route::get('/profile', [LandingPageController::class, 'profile'])->name('landingPage.profile');
    Route::get('/order', [LandingPageController::class, 'order'])->name('landingPage.order');
    Route::get('detail_cicilan/{id}', [LandingPageController::class, 'detail_cicilan'])->name('landingPage.detail_cicilan');
    Route::get('/kontak', [LandingPageController::class, 'kontak'])->name('landingPage.kontak');
    Route::get('/invoice', [LandingPageController::class, 'invoice'])->name('landingPage.invoice');
    Route::get('/invoice_cicilan', [LandingPageController::class, 'invoice_cicilan'])->name('landingPage.invoice_cicilan');
    Route::get('detail_mobil/{id}', [LandingPageController::class, 'detail_mobil'])->name('landingPage.detail_mobil');
});

Route::middleware(['custom-auth'])->group(
    function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        });

        Route::get('/gps-data', function () {
            $locations = \App\Models\GpsTracking::orderBy('id', 'desc')->get();
            return response()->json($locations);
        });


        // Produk
        Route::prefix('produk')->group(function () {
            Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
            Route::post('/store', [ProdukController::class, 'store'])->name('produk.store');
            Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
            Route::post('/update', [ProdukController::class, 'update'])->name('produk.update');
            Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
        });

        // User
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::post('/store', [UserController::class, 'store'])->name('user.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::post('/update', [UserController::class, 'update'])->name('user.update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        });

        // Pesanan
        Route::prefix('pesanan')->group(function () {
            Route::get('/', [PesananController::class, 'index'])->name('pesanan.index');
            Route::post('/store', [PesananController::class, 'store'])->name('pesanan.store');
            Route::get('/edit/{id}', [PesananController::class, 'edit'])->name('pesanan.edit');
            Route::post('/update', [PesananController::class, 'update'])->name('pesanan.update');
            Route::delete('/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');
            Route::get('/show/{id}', [PesananController::class, 'show'])->name('pesanan.show');
            Route::post('/bukti_pembayaran', [PesananController::class, 'bukti_pembayaran'])->name('pesanan.bukti_pembayaran');
            Route::post('/pembayaran_cicilan', [PesananController::class, 'pembayaran_cicilan'])->name('pesanan.pembayaran_cicilan');
            Route::post('/exportlaporan', [PesananController::class, 'exportLaporan'])->name('pesanan.exportlaporan');
        });

        // Lokasi
        Route::prefix('lokasi')->group(function () {
            Route::get('/', [LokasiController::class, 'index'])->name('lokasi.index');
            Route::get('/real-time', [LokasiController::class, 'getRealTime'])->name('lokasi.real-time');
        });


        // Logout
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        // Verifikasi Status
        Route::post('verifikasi-status', VerifikasiStatus::class);
    }
);
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/postRegister', [AuthController::class, 'postRegister'])->name('postRegister');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
