<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnabulController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;


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
Route::get('/anabul', [AnabulController::class, 'index'])->name('anabul.index');


// Area Owner
Route::middleware(['role:owner'])->group(function () {

    Route::get('/dashboard', function () {
    $totalAnabul = \App\Models\Anabul::count();
    $totalCustomer = \App\Models\User::where('role', 'customer')->count();
    $totalPesanan = \App\Models\Order::count();
    $menungguKonfirmasi = \App\Models\Order::where(
        'status_pesanan',
        'Menunggu Konfirmasi'
    )->count();

    return view('owner.dashboard', compact(
        'totalAnabul',
        'totalCustomer',
        'totalPesanan',
        'menungguKonfirmasi'
    ));
    })->name('owner.dashboard');

    // Route untuk menampilkan daftar anabul yang dimiliki oleh owner
    Route::get('/kelola-anabul', [AnabulController::class, 'ownerIndex'])->name('owner.anabul.index');

    // Route untuk menampilkan daftar pesanan dan detail pesanan
    Route::get('/pesanan', [OrderController::class, 'ownerIndex'])->name('owner.order.index');
    Route::get('/pesanan/{order}', [OrderController::class, 'ownerShow'])->name('owner.order.show');
    Route::put('/pesanan/{order}/status', [OrderController::class, 'updateStatus'])->name('owner.order.updateStatus');

    // Route untuk menampilkan daftar customer dan menghapus customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::delete('/customer/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');

    // route untuk mengupdate profil owner
    Route::put('/profil-owner', [AuthController::class, 'updateOwnerProfile'])->name('owner.profile.update');

    // CRUD Anabul untuk Owner
    Route::get('/anabul/create', [AnabulController::class, 'create'])->name('anabul.create');
    Route::post('/anabul', [AnabulController::class, 'store'])->name('anabul.store');
    Route::get('/anabul/{anabul}/edit', [AnabulController::class, 'edit'])->name('anabul.edit');
    Route::put('/anabul/{anabul}', [AnabulController::class, 'update'])->name('anabul.update');
    Route::delete('/anabul/{anabul}', [AnabulController::class, 'destroy'])->name('anabul.destroy');
    Route::get('/profil-owner', [AuthController::class, 'ownerProfile'])->name('owner.profile');


});

Route::get('/anabul/{anabul}', [AnabulController::class, 'show'])->name('anabul.show');


// Area customer
Route::middleware(['role:customer'])->group(function () {
// Order
    Route::resource('order', OrderController::class)->only(['index', 'create', 'store', 'show']);
// route untuk membatalkan pesanan
    Route::patch('/order/{order}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');
// route untuk menampilkan halaman profil dan mengupdate profil
    Route::get('/profil', [AuthController::class, 'profile'])->name('customer.profile');
    Route::put('/profil', [AuthController::class, 'updateProfile'])
    ->name('customer.profile.update');
});

//route untuk contact
Route::get('/contact', function () {return view('contact');})->name('contact');
