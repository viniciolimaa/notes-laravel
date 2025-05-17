<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Support\Facades\Route;

// auth routes
Route::middleware(CheckIsNotLogged::class)->group(function(){

Route::get('/login', [AuthController::class, 'login']);
Route::post('/loginSubmit', [AuthController::class, 'loginsubmit']);

});

Route::middleware(CheckIsLogged::class)->group(function(){

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/newNote', [MainController::class, 'newNote'])->name('new');
Route::get('/logout', [MainController::class, 'logout'])->name('logout');

});



