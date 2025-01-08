<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/masterUser', [MasterController::class, 'indexUser'])->name('masterUser.indexUser');
Route::get('/masterAdmin', [MasterController::class, 'indexAdmin'])->name('masterAdmin.indexAdmin');

//home
// Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::prefix('/')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('landingPage.index');
    Route::get('/about', [LandingPageController::class, 'about'])->name('landingPage.about');
    Route::get('/layanan', [LandingPageController::class, 'layanan'])->name('landingPage.layanan');
    Route::get('/harga', [LandingPageController::class, 'harga'])->name('landingPage.harga');
    Route::get('/mobil', [LandingPageController::class, 'mobil'])->name('landingPage.mobil');
    Route::get('/kontak', [LandingPageController::class, 'kontak'])->name('landingPage.kontak');
    Route::get('/detailMobil', [LandingPageController::class, 'detailMobil'])->name('landingPage.detailMobil');
});

Route::prefix('auth')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    //     Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    //     Route::post('/postRegister', [AuthController::class, 'postRegister'])->name('auth.postRegister');
    //     Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('auth.postlogin');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/index', [DashboardController::class, 'index'])->name('dashboard.index');
});


// Produk
Route::prefix('produk')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::post('/update', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});
