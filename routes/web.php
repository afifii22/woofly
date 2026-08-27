<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnabulController;
use App\Http\Controllers\OrderController;


Route::get('/', function () {
    return view('home');
});

// Authentication routes
Route::get('/login', function () {return view('auth.login');})->name('login');
Route::get('/register', function () {return view('auth.register');})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Katalog Anabul - dapat diakses publik
Route::get('/anabul', [AnabulController::class, 'index'])
    ->name('anabul.index');



// Area Owner
Route::middleware(['role:owner'])->group(function () {

    Route::get('/dashboard', function () {
        return view('owner.dashboard');
    })->name('owner.dashboard');

    // CRUD Anabul untuk Owner
    Route::get('/anabul/create', [AnabulController::class, 'create'])
        ->name('anabul.create');

    Route::post('/anabul', [AnabulController::class, 'store'])
        ->name('anabul.store');

    Route::get('/anabul/{anabul}/edit', [AnabulController::class, 'edit'])
        ->name('anabul.edit');

    Route::put('/anabul/{anabul}', [AnabulController::class, 'update'])
        ->name('anabul.update');

    Route::delete('/anabul/{anabul}', [AnabulController::class, 'destroy'])
        ->name('anabul.destroy');
});

Route::get('/anabul/{anabul}', [AnabulController::class, 'show'])
    ->name('anabul.show');


// Area customer
Route::middleware(['role:customer'])->group(function () {
// Order
    Route::resource('order', OrderController::class);
});
