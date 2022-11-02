<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\FluentController;
use App\Http\Controllers\EconomicCustomerController;
use App\Http\Controllers\DriverController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('analytics', AnalyticsController::class, ['only' => 'index']);

Route::apiResource('fluent', FluentController::class, ['only' => 'index']);

Route::apiResource('driver', DriverController::class, ['only' => 'index']);

Route::prefix('economic')->name('economic.')->group(function () {
    Route::apiResource('customer', EconomicCustomerController::class, ['only' => 'store']);
});
