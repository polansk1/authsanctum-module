<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\AuthSanctum\Http\Controllers\AuthSanctumController;

/*
|--------------------------------------------------------------------------
| API Authenthication Routes
| Base Endpoint: domain/api/auth/*
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthSanctumController::class, 'register']);
    Route::post('login', [AuthSanctumController::class, 'login']);
    Route::post('logout', [AuthSanctumController::class, 'logout'])->middleware('auth:sanctum');
});

/*
|--------------------------------------------------------------------------
| Authentichated Routes
| Base Endpoint: domain/api/*
|--------------------------------------------------------------------------
|
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', function (Request $request) {
        return auth()->user();
    });
});
