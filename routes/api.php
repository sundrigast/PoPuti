<?php

use Illuminate\Http\Request;

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

Route::group([
    'prefix' => 'auth',
    'before' => 'auth',
    'as' => 'auth.'
], function () {
    Route::post('/', 'AuthController@auth')->name('store');
    Route::post('/login', 'AuthController@login')->name('login');
    Route::get('/check', 'AuthController@check')->name('check')
    ->middleware(['auth:sanctum,api']);
    Route::get('/logout', 'AuthController@logout')->name('logout')
        ->middleware(['auth:sanctum,api']);
});

Route::prefix('admin')->group(function () {
    Route::post('/login', 'UserController@login')->name('login')
        ->middleware(['auth:sanctum,api']);
});

Route::apiResource('rides', 'RideController')
    ->middleware(['auth:sanctum,api']);

Route::group([
    'prefix' => 'rides',
    'before' => 'rides',
    'middleware' => ['auth:sanctum,api'],
    'as' => 'rides.'
], function () {
    Route::get('/{ride}/offers', 'RideController@offers');
    Route::get('/{ride}/chat', 'RideController@chat');
});

Route::apiResource('users', 'UserController')
    ->middleware(['auth:sanctum,api']);

Route::get('users/{user}/reviews', 'UserController@reviews')
    ->middleware(['auth:sanctum,api']);

Route::group([
    'prefix' => 'users/me',
    'before' => 'users/me',
    'middleware' => ['auth:sanctum,api'],
    'as' => 'users.'
], function () {
    Route::get('/', 'AuthUserController@showMe');
    Route::get('/driver_history', 'AuthUserController@driverHistory');
    Route::get('/passenger_history', 'AuthUserController@passengerHistory');
    Route::get('/reviews', 'AuthUserController@reviews');
    Route::get('/regular_rides', 'AuthUserController@regularRides');
    Route::get('/regular_rides_archived', 'AuthUserController@regularRidesArchived');
});

Route::apiResource('drivers', 'DriverController')
    ->middleware(['auth:sanctum,api']);

Route::group([
    'prefix' => 'drivers',
    'before' => 'drivers',
    'middleware' => ['auth:sanctum,api'],
    'as' => 'drivers.'
], function () {
    Route::get('/{driver}/documents', 'DriverController@documents');
    Route::put('/{driver}/location', 'DriverController@location');
});

Route::apiResource('reviews', 'ReviewController')
    ->middleware(['auth:sanctum,api']);

Route::apiResource('files', 'MediaController')
    ->middleware(['auth:sanctum,api']);

Route::apiResource('reasons', 'ReasonController')
    ->middleware(['auth:sanctum,api']);

Route::apiResource('offers', 'OfferController')
    ->middleware(['auth:sanctum,api']);

Route::apiResource('messages', 'MessageController')
    ->middleware(['auth:sanctum,api']);

Route::apiResource('schedules', 'ScheduleController')
    ->middleware(['auth:sanctum,api']);




