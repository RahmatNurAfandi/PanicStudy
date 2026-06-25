<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PanicStudyApiController;
use App\Http\Controllers\Api\AuthApiController;

Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/register', [AuthApiController::class, 'register']);

Route::get('/dashboard', [PanicStudyApiController::class, 'dashboard']);
Route::get('/materi', [PanicStudyApiController::class, 'materi']);
Route::get('/materi/{id}', [PanicStudyApiController::class, 'detailMateri']);
Route::get('/jadwal', [PanicStudyApiController::class, 'jadwal']);
Route::get('/latihan', [PanicStudyApiController::class, 'latihan']);
Route::get('/progress', [PanicStudyApiController::class, 'progress']);
Route::get('/profil', [PanicStudyApiController::class, 'profil']);