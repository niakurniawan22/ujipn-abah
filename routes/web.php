<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as DashboardAdmin;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Siswa\DashboardController as DashboardSiswa;

Route::get('/', function () {
    // cek apakah dia login atau tidak
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('siswa.dashboard');
        }
    }
    // kalau tidak login
    return redirect('/login');
});

// Routing untuk proses login
Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest')->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routing untuk admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardAdmin::class, 'index'])->name('dashboard');
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('/form-siswa', [SiswaController::class, 'create'])->name('form-siswa');
});

// Routing untuk siswa
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [DashboardSiswa::class, 'index'])->name('dashboard');
    Route::get('/aspirasi', [DashboardSiswa::class, 'tambahAspirasi'])->name('tambah-aspirasi');
    Route::post('/aspirasi', [DashboardSiswa::class, 'simpanAspirasi'])->name('proses-tambah');
});
