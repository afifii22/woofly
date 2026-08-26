<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// CRUD Anabul routes
Route::resource('anabul', App\Http\Controllers\AnabulController::class);

// CRUD Order routes
Route::resource('order', App\Http\Controllers\OrderController::class);
