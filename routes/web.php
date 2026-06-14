<?php

use Illuminate\Support\Facades\Route;
use App\Contracts\PlannerServiceInterface;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Guest-only routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Authenticated-only routes
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/materi', [DashboardController::class, 'materi'])->name('materi');
    Route::get('/materi/{id}', [DashboardController::class, 'detailMateri'])->name('detail-materi');
    Route::get('/jadwal', [DashboardController::class, 'jadwal'])->name('jadwal');
    Route::get('/jadwal/tambah', [DashboardController::class, 'tambahJadwal'])->name('tambah-jadwal');
    Route::post('/jadwal/tambah', [DashboardController::class, 'simpanJadwal'])->name('simpan-jadwal');
    Route::get('/latihan', [DashboardController::class, 'latihan'])->name('latihan');
    Route::get('/progress', [DashboardController::class, 'progress'])->name('progress');
    Route::get('/profil', [DashboardController::class, 'profil'])->name('profil');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/test-container', function (
    PlannerServiceInterface $plannerService
) {
    return response()->json([
        'message' => 'Service Container berhasil',
        'service' => get_class($plannerService),
    ]);
});
