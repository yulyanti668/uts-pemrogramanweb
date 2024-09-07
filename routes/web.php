<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenjualanBarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileUploadController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

// -------------------------------- Route Login --------------------------------
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login-form');
Route::post('/login', [LoginController::class, 'login'])->name('login-post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// -------------------------------- Route Dashboard --------------------------------
Route::get('/', [DashboardController::class, 'index'])->name('welcome-page')->middleware(Authenticate::class);

// -------------------------------- Route Penjualan --------------------------------
Route::get('/penjualan', [PenjualanBarangController::class, 'index'])->name("list-penjualan")->middleware(Authenticate::class);
Route::get('/penjualan/create', [PenjualanBarangController::class, 'create'])->name("create-penjualan")->middleware(Authenticate::class);
Route::post('/penjualan/store', [PenjualanBarangController::class, 'store'])->name("post-penjualan")->middleware(Authenticate::class);
Route::get('/penjualan/{penjualanBarang}/edit', [PenjualanBarangController::class, 'edit'])->name("edit-penjualan")->middleware(Authenticate::class);
Route::put('/penjualan/{penjualanBarang}/update', [PenjualanBarangController::class, 'update'])->name("update-penjualan")->middleware(Authenticate::class);
Route::delete('/penjualan/{penjualanBarang}/delete', [PenjualanBarangController::class, 'delete'])->name("delete-penjualan")->middleware(Authenticate::class);

// -------------------------------- Route Profile --------------------------------
Route::get('/profile', [FileUploadController::class, 'FormAvatar'])->name('profile')->middleware(Authenticate::class);
Route::put('/profile/avatar/{user}', [FileUploadController::class, 'store'])->name('profile-store')->middleware(Authenticate::class);
