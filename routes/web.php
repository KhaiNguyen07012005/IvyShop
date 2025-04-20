<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('Home.home');
})->name('home.page');

Route::get('/login', function () {
    return view('Home.login');
})->name('login');
Route::get('/', [ProductController::class, 'index'])->name('home.page');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/cities/{region_id}', [RegisterController::class, 'getCities'])->name('cities');
Route::get('/wards/{city_id}', [RegisterController::class, 'getWards'])->name('wards');

Route::get('/captcha', function () {
    session(['captcha' => 'random_string']);
    return response()->json(['captcha' => 'random_string']);
})->name('captcha');
?>