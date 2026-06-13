<?php

use Illuminate\Support\Facades\Route;
use App\Contracts\PlannerServiceInterface;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-container', function (
    PlannerServiceInterface $plannerService
) {
    return response()->json([
        'message' => 'Service Container berhasil',
        'service' => get_class($plannerService),
    ]);
});
