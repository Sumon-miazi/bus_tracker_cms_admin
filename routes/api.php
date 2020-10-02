<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/driverSignIn','App\Http\Controllers\DriverController@signIn');
Route::post('/userFeedbackAboutBusToServer','App\Http\Controllers\BusController@store');
Route::post('/getBusCurrentPositionByBusId','App\Http\Controllers\BusController@busLocationById');

Route::post('/getAllBuses','App\Http\Controllers\BusController@getAllBuses');