<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\PaymentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Ces routes sont destinées à l’API REST (pour l’application mobile ou front).
|--------------------------------------------------------------------------
*/

// Route de test API
Route::get('/ping', fn() => response()->json(['status' => 'API OK']));

// Routes protégées avec sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn(Request $request) => $request->user());

    // Utilisateurs
    Route::apiResource('users', UserController::class);

    // Paiements
    Route::apiResource('payments', PaymentController::class);

    // Événements
    Route::apiResource('events', EventController::class);

    // Présences
    Route::apiResource('attendances', AttendanceController::class);

    // Articles
});
