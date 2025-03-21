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


Route::get('/masterUser', [MasterController::class, 'indexUser'])->name('masterUser.indexUser');
Route::get('/masterAdmin', [MasterController::class, 'indexAdmin'])->name('masterAdmin.indexAdmin');

Route::prefix('/')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('landingPage.index');
    Route::get('/about', [LandingPageController::class, 'about'])->name('landingPage.about');
    Route::get('/layanan', [LandingPageController::class, 'layanan'])->name('landingPage.layanan');
    Route::get('/harga', [LandingPageController::class, 'harga'])->name('landingPage.harga');
    Route::get('/mobil', [LandingPageController::class, 'mobil'])->name('landingPage.mobil');
    Route::get('/kontak', [LandingPageController::class, 'kontak'])->name('landingPage.kontak');
    Route::get('/detailMobil', [LandingPageController::class, 'detailMobil'])->name('landingPage.detailMobil');
});

Route::middleware(['custom-auth'])->group(
    function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
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
        });

        //Auth
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    }
);
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/postRegister', [AuthController::class, 'postRegister'])->name('postRegister');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
