<?php

use Illuminate\Support\Facades\Route;


Route::get('register', '\App\Http\Controllers\AuthController@getRegisterForm');
Route::post('register', '\App\Http\Controllers\AuthController@register');
Route::get('login', '\App\Http\Controllers\AuthController@getLoginForm');
Route::post('login', '\App\Http\Controllers\AuthController@login');
Route::get('logout', '\App\Http\Controllers\AuthController@logout');

Route::resource('newss', \App\Http\Controllers\NewsController::class)
    ->only(['index', 'show', 'store', 'update', 'destroy']);

Route::get('/', function () {;
});
