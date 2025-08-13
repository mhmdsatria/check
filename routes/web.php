<?php
use App\Http\Controllers\AdminBidangController;
use App\Http\Controllers\ImpersonateController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

// Public konsultasi
Route::get('/', [KonsultasiController::class, 'index'])->name('konsultasi.index');
Route::get('/form-konsultasi', [KonsultasiController::class, 'create'])->name('konsultasi.create');
Route::post('/konsultasi', [KonsultasiController::class, 'store'])->name('konsultasi.store');

// Profile (login required)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard redirect
Route::get('/dashboard', function () {
    $user = auth()->user();
    if (!$user) {
        return redirect()->route('login');
    }

    if ($user->role === 'superadmin') {
        return redirect()->route('superadmin.dashboard');
    }

    if ($user->role === 'admin_bidang') {
        return redirect()->route('admin.dashboard');
    }

    abort(403);
})->middleware('auth')->name('dashboard');

// Superadmin routes
Route::middleware(['auth'])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/', [SuperAdminController::class, 'dashboard'])->name('dashboard');
   Route::get('/konsultasi', [SuperAdminController::class, 'listKonsultasi'])->name('superadmin.konsultasi.index');
    Route::get('/accounts', [SuperAdminController::class, 'accounts'])->name('accounts');
    Route::post('/accounts', [SuperAdminController::class, 'storeAccount'])->name('accounts.store');
    Route::get('/accounts/{id}/edit', [SuperAdminController::class, 'editAccount'])->name('accounts.edit');
    Route::put('/accounts/{id}', [SuperAdminController::class, 'updateAccount'])->name('accounts.update');
    Route::delete('/accounts/{id}', [SuperAdminController::class, 'destroyAccount'])->name('accounts.destroy');
    Route::get('/bidang', [SuperAdminController::class, 'bidangIndex'])->name('bidang.index');
    Route::get('/bidang/create', [SuperAdminController::class, 'bidangCreate'])->name('bidang.create');
    Route::post('/bidang', [SuperAdminController::class, 'bidangStore'])->name('bidang.store');
    Route::get('/bidang/{id}/edit', [SuperAdminController::class, 'bidangEdit'])->name('bidang.edit');
    Route::put('/bidang/{id}', [SuperAdminController::class, 'bidangUpdate'])->name('bidang.update');
    Route::delete('/bidang/{id}', [SuperAdminController::class, 'bidangDestroy'])->name('bidang.destroy');
    Route::post('/assign/{id}', [SuperAdminController::class, 'assign'])->name('assign');
    Route::post('/impersonate/{adminId}', [ImpersonateController::class, 'impersonate'])->name('impersonate');
    Route::post('/stop-impersonate', [ImpersonateController::class, 'stop'])->name('stop_impersonate');
    Route::get('/konsultasi/export-pdf', [SuperAdminController::class, 'exportPdf'])->name('konsultasi.export-pdf');
});

// Admin Bidang routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminBidangController::class, 'dashboard'])->name('dashboard');
    Route::get('/konsultasi/{id}', [AdminBidangController::class, 'show'])->name('konsultasi.show');
    Route::post('/konsultasi/{id}/verify', [AdminBidangController::class, 'verify'])->name('konsultasi.verify');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__ . '/auth.php';

