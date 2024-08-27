<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaithNewsController;
use App\Http\Controllers\CommunityNewsController;
use App\Http\Controllers\GeneralNewsController;
use App\Http\Controllers\WritersController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\VocabularyController;

Route::get('/', function () {
    return view('pages.home');
});
Route::middleware('auth')->group(function () {
    Route::get('/vocabulary', [VocabularyController::class, 'index'])->name('vocabulary.index');
    Route::post('/vocabulary/search', [VocabularyController::class, 'search'])->name('vocabulary.search');
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
Route::get('/faith-news', [FaithNewsController::class, 'index'])->name('faith-news');
Route::get('/faith-news/load-more', [FaithNewsController::class, 'loadMore'])->name('faith-news.loadMore');
Route::get('/community-news', [CommunityNewsController::class, 'index'])->name('community-news');
Route::get('/community-news/load-more', [CommunityNewsController::class, 'loadMore'])->name('community-news.loadMore');
Route::get('/general-news', [GeneralNewsController::class, 'index'])->name('general-news');
Route::get('/general-news/load-more', [GeneralNewsController::class, 'loadMore'])->name('general-news.loadMore');
Route::get('/writers', [WritersController::class, 'index'])->name('writers');
Route::get('/writers/load-more', [WritersController::class, 'loadMore'])->name('writers.loadMore');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/partners', [PartnersController::class, 'index'])->name('partners');
