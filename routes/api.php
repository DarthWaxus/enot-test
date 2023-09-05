<?php

use App\Http\Controllers\Api\V1\ConfirmationController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::prefix('users')->controller(UserController::class)->group(function () {

        Route::prefix('{user}')->group(function () {

            Route::controller(UserController::class)->group(function () {
                Route::post('/', 'update');
            });

            Route::prefix('confirmations')->controller(ConfirmationController::class)->group(function () {
                Route::post('/', 'create');
            });

        });
    });

});
