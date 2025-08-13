<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminBidangController;
use App\Http\Controllers\ImpersonateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public: konsultasi form
Route::get('/', [KonsultasiController::class, 'create'])->name('konsultasi.create');
Route::post('/konsultasi', [KonsultasiController::class, 'store'])->name('konsultasi.store');

// Auth routes (use Breeze or your auth)
require __DIR__.'/auth.php';

// Group: Super Admin (middleware 'auth' + 'role:superadmin')
Route::middleware(['auth','role:superadmin'])->group(function(){
    Route::get('/superadmin', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::get('/superadmin/accounts', [SuperAdminController::class, 'accounts'])->name('superadmin.accounts');
    Route::post('/superadmin/assign/{id}', [SuperAdminController::class, 'assign'])->name('superadmin.assign');
    Route::post('/superadmin/impersonate/{adminId}', [ImpersonateController::class, 'impersonate'])->name('superadmin.impersonate');
    Route::post('/superadmin/stop-impersonate', [ImpersonateController::class, 'stop'])->name('superadmin.stop_impersonate');
});

// Group: Admin Bidang
Route::middleware(['auth','role:admin_bidang'])->group(function(){
    Route::get('/admin', [AdminBidangController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/konsultasi/{id}', [AdminBidangController::class, 'show'])->name('admin.konsultasi.show');
    Route::post('/admin/konsultasi/{id}/verify', [AdminBidangController::class, 'verify'])->name('admin.konsultasi.verify');
});
