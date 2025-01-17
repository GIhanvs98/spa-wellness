<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;



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
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Feedback Routes
    Route::get('/feedback', [DashboardController::class, 'showFeedbackForm'])->name('feedback');
    Route::post('/feedback', [FeedbackController::class, 'submit'])->name('submit');
    Route::get('/compliance', [FeedbackController::class, 'showCompliance'])->name('compliance');



    // User Management Routes (Admin-only)
    Route::get('/users', [DashboardController::class, 'listUsers'])->name('users');
    Route::get('/users/{user}', [DashboardController::class, 'viewUser'])->name('viewUser');
    Route::get('/users/{user}/edit', [DashboardController::class, 'editUser'])->name('editUser');
    Route::put('/users/{user}', [DashboardController::class, 'updateUser'])->name('updateUser');
    Route::delete('/users/{user}', [DashboardController::class, 'deleteUser'])->name('deleteUser');

    // Account Management
    Route::get('/account', [DashboardController::class, 'accountSettings'])->name('accountSettings');
    Route::post('/account', [DashboardController::class, 'updateAccount'])->name('updateAccount');

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
});