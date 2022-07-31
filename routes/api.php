<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\DynamicFormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Version 1
|--------------------------------------------------------------------------
*/
Route::prefix('v1')->group(function () {
    /*
    | Login & Register
    */
    Route::post('register', [AuthController::class, 'register']);

    Route::post('login', [AuthController::class, 'login']);

    /*
    | Auth Middleware
    */
    Route::middleware('auth:sanctum')->group(function() {
        /*
        | Dynamic Form
        */
        Route::post('dynamic-form', [DynamicFormController::class, 'store']);
    });
});
