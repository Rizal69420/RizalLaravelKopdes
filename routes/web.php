<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('manager', App\Http\Controllers\ManagerController::class);
Route::resource('kopdes', App\Http\Controllers\KopdesController::class);
