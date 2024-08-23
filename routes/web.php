<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/create-order', [PaymentController::class, 'createOrder'])->name('create.order');
Route::post('/register', [AuthController::class, 'registerWithPayment'])->name('register.payment');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
