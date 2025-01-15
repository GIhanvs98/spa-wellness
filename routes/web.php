<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;

// Static pages
Route::view('/', 'home')->name('home');
Route::view('/knowledge-area', 'knowledge-area')->name('knowledge-area');
Route::view('/about-us', 'about-us')->name('about-us');

// Feedback Form Routes
Route::get('/feedback', function () {
    return view('feedback'); // Ensure `resources/views/feedback.blade.php` exists
})->name('feedback');

Route::post('/feedback', [FeedbackController::class, 'submit'])->name('feedback.submit');
