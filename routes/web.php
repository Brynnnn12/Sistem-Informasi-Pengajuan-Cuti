<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisCutiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PengajuanCutiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::middleware(['auth', 'role:Admin'])->group(function () {
            Route::resource('users', UserController::class);

            Route::resource('jabatan', JabatanController::class);
            Route::resource('jenis-cuti', JenisCutiController::class);
            Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
            Route::get('/karyawan/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
            Route::put('/karyawan/update', [KaryawanController::class, 'update'])->name('karyawan.update');
            Route::patch('/pengajuan/{pengajuan}/status/{status}', [PengajuanCutiController::class, 'updateStatus'])
                ->name('pengajuan.updateStatus');
            Route::resource('pengajuan', PengajuanCutiController::class);
        });
    });
});

require __DIR__ . '/auth.php';
