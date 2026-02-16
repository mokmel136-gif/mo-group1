<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'sendMessage'])->name('contact.send');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', AdminProjectController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('team', TeamController::class);
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy', 'update']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Google Auth Routes
Route::get('auth/google', [App\Http\Controllers\Authorize\GoogleAuthController::class, 'redirect'])->name('google.login');
Route::get('auth/google/callback', [App\Http\Controllers\Authorize\GoogleAuthController::class, 'callback']);
