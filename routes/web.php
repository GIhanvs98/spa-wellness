<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AuthController;


// Static pages
Route::view('/', 'home')->name('home');
Route::view('/knowledge-area', 'knowledge-area')->name('knowledge-area');
Route::view('/about-us', 'about-us')->name('about-us');

// Feedback Form Routes
Route::get('/feedback', function () {
    return view('feedback'); // Ensure `resources/views/feedback.blade.php` exists
})->name('feedback');

Route::post('/feedback', [FeedbackController::class, 'submit'])->name('feedback.submit');

Route::middleware('guest')->group(function () {
    Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
