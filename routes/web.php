<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\EditProfile;
use App\Livewire\Profile;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Public routes
Route::get('/login', Login::class)->name('login');
Route::get('/logout', Logout::class)->name('logout');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile/{id}', Profile::class)->name('profile');
    Route::get('/edit-profile/{id}', EditProfile::class)->name('edit.profile');

    // Admin-only routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/users', UserIndex::class)->name('user.index');
        Route::get('/add-user', UserCreate::class)->name('user.create');
        Route::get('/edit-user/{id}', UserEdit::class)->name('user.edit');
    });

    // User-only routes (if different from admin, otherwise skip this)
    Route::middleware('role:user')->group(function () {
        // Add user-only specific routes here (if needed)
        // Avoid duplicating routes already accessible to admin
    });
});
