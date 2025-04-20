<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;

use Intervention\Image\ImageManagerStatic as Image;

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
    if (!extension_loaded('gd')) {
        \Log::error('GD extension is not enabled');
        return response('GD extension not enabled', 500);
    }

    try {
        $captcha = str_random(6);
        session(['captcha' => $captcha]);
        \Log::info('Generated captcha: ' . $captcha);

        $image = Image::canvas(150, 50, '#f0f0f0');
        $image->text($captcha, 75, 25, function($font) {
            $font->size(24);
            $font->color('#000000');
            $font->align('center');
            $font->valign('middle');
        });

        return response($image->encode('png'))->header('Content-Type', 'image/png');
    } catch (\Exception $e) {
        \Log::error('Captcha generation failed: ' . $e->getMessage());
        return response('Error generating captcha: ' . $e->getMessage(), 500);
    }
})->name('captcha');
?>