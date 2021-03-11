<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/apidoc', function() {
    return view('apidoc.index');
});

Route::get('policy', function() {
    return response()
        ->file(public_path('policies/privacy.pdf'));
});

Route::get('eula', function() {
    return response()
        ->file(public_path('policies/eula.pdf'));
});
