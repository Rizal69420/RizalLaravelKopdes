<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return redirect('/login');
});

Route::resource('manager', App\Http\Controllers\ManagerController::class);
Route::resource('kopdes', App\Http\Controllers\KopdesController::class);

Route::get('/login',[SessionController::class,'index']);
Route::get('/sesi',[SessionController::class,'index']);
Route::post('/sesi/login',[SessionController::class,'login']);
Route::get('/sesi/logout',[SessionController::class,'logout']);
