<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudyPlannerController;
use App\Http\Controllers\ProgressTrackerController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Health Check
Route::get('/health', function () {
    return response()->json([
        'success' => true,
        'message' => 'PanicStudy API is running',
        'version' => '1.0.0',
    ]);
});


/*
|--------------------------------------------------------------------------
| Protected Routes (Sanctum)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [DashboardController::class, 'profil']);

    Route::put('/profile', [DashboardController::class, 'updateProfil']);

    Route::post('/logout', [AuthController::class, 'logout']);


    /*
    |--------------------------------------------------------------------------
    | Study Planner
    |--------------------------------------------------------------------------
    */

    Route::get('/planners', [StudyPlannerController::class, 'index']);

    Route::post('/planners', [StudyPlannerController::class, 'store']);

    Route::get('/planners/{id}', [StudyPlannerController::class, 'show']);

    Route::put('/planners/{id}', [StudyPlannerController::class, 'update']);

    Route::delete('/planners/{id}', [StudyPlannerController::class, 'destroy']);


    /*
    |--------------------------------------------------------------------------
    | Reminder
    |--------------------------------------------------------------------------
    */

    Route::get('/reminders', [ReminderController::class, 'index']);

    Route::post('/reminders', [ReminderController::class, 'store']);

    Route::get('/reminders/{id}', [ReminderController::class, 'show']);

    Route::put('/reminders/{id}', [ReminderController::class, 'update']);

    Route::delete('/reminders/{id}', [ReminderController::class, 'destroy']);


    /*
    |--------------------------------------------------------------------------
    | Progress Tracker
    |--------------------------------------------------------------------------
    */

    Route::get('/progress', [ProgressTrackerController::class, 'index']);

    Route::post('/progress', [ProgressTrackerController::class, 'store']);

    Route::get('/progress/{id}', [ProgressTrackerController::class, 'show']);

    Route::put('/progress/{id}', [ProgressTrackerController::class, 'update']);

    Route::delete('/progress/{id}', [ProgressTrackerController::class, 'destroy']);


    /*
    |--------------------------------------------------------------------------
    | Materi
    |--------------------------------------------------------------------------
    */

    Route::get('/materials', [DashboardController::class, 'materi']);

    Route::get('/materials/{id}', [DashboardController::class, 'detailMateri']);


    /*
    |--------------------------------------------------------------------------
    | Latihan Soal
    |--------------------------------------------------------------------------
    */

    Route::get('/exercises', [DashboardController::class, 'latihan']);

    Route::get('/exercises/{id}', [DashboardController::class, 'detailLatihan']);

});