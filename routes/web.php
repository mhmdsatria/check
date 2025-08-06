<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DEFAULT REDIRECT BERDASARKAN ROLE
|--------------------------------------------------------------------------
*/


Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role === 'SuperAdmin') {
            return redirect()->route('super-admin.index');
        } elseif (Auth::user()->role === 'Admin') {
            return redirect()->route('admin.index');
        }
    }
    return view('welcome'); // atau redirect ke halaman publik
});

/*
|--------------------------------------------------------------------------
| LOGIN & LOGOUT
|--------------------------------------------------------------------------
*/
// Login Super Admin
Route::get('/login/superadmin', [SesiController::class, 'index'])->name('login.superadmin');
Route::post('/login/superadmin', [SesiController::class, 'loginSuperAdmin'])->name('post.login.superadmin');

// Login Admin Divisi
Route::get('/login/admin', [SesiController::class, 'index'])->name('login.admin');
Route::post('/login/admin', [SesiController::class, 'loginAdmin'])->name('post.login.admin');

// Logout per role
Route::post('/logout', [SesiController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD SUPER ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware('superadmin.auth')->prefix('admin/super-admin')->group(function () {
    Route::get('/', [AdminController::class, 'superAdmin'])->name('super-admin.index');
    Route::get('/add-user', [AdminController::class, 'addUserForm'])->name('super-admin.add-user');
    Route::post('/add-user', [AdminController::class, 'addUser'])->name('super-admin.store-user');
    Route::get('/divisi', [AdminController::class, 'listDivisi'])->name('super-admin.divisi');
    Route::post('/divisi', [AdminController::class, 'storeDivisi'])->name('super-admin.store-divisi');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN DIVISI
|--------------------------------------------------------------------------
*/
Route::middleware('admin.auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/konsultasi/{id}/verifikasi', [AdminController::class, 'verifikasiKonsultasi'])->name('konsultasi.verifikasi');
});

/*
|--------------------------------------------------------------------------
| KONSULTASI PUBLIK (TANPA LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/konsultasi', [KonsultasiController::class, 'create'])->name('konsultasi.create');
Route::post('/konsultasi', [KonsultasiController::class, 'store'])->name('konsultasi.store');
