<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'role:admin'])->group(function () {
    // dashboard
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // users
    Route::get('/users', UserIndex::class)->name('user.index');
    Route::get('/add-user', UserCreate::class)->name('user.create');
    Route::get('/edit-user/{id}', UserEdit::class)->name('user.edit');
});

// Route::middleware(['auth', 'role:user'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::get('/login', Login::class)->name('login');
Route::get('/logout', Logout::class)->name('logout');
