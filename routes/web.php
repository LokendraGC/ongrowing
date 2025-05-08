<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Calculator\CalculatorIndex;
use App\Livewire\EditProfile;
use App\Livewire\Expenses\AddExpenses;
use App\Livewire\Expenses\AllExpenses;
use App\Livewire\Expenses\EditExpenses;
use App\Livewire\Payments\AddKitta;
use App\Livewire\Payments\PaymentCreate;
use App\Livewire\Payments\PaymentEdit;
use App\Livewire\Payments\PaymentIndex;
use App\Livewire\Payments\Status;
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
    Route::get('/calculator', CalculatorIndex::class)->name('basic.calculator');
    Route::get('/users', UserIndex::class)->name('user.index');

    // expenses
    Route::get('/all-expenses',AllExpenses::class)->name('expense.index');
    Route::get('/add-expense',AddExpenses::class)->name('expense.add');
    Route::get('/edit-expense/{id}',EditExpenses::class)->name('expense.edit');

    // payments
    Route::get('pay', PaymentCreate::class)->name('pay.add');
    Route::get('transactions', PaymentIndex::class)->name('pay.index');
    Route::get('edit-payment/{id}', PaymentEdit::class)->name('pay.edit');

    // Admin-only routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/add-user', UserCreate::class)->name('user.create');
        Route::get('/edit-user/{id}', UserEdit::class)->name('user.edit');
        Route::get('status', Status::class)->name('pay.status');
    });

    // User-only routes (if different from admin, otherwise skip this)
    Route::middleware('role:user')->group(function () {});
});
