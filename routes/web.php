<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\AddKitta;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Calculator\CalculatorIndex;
use App\Livewire\ChangePassword;
use App\Livewire\EditProfile;
use App\Livewire\Expenses\AddExpenses;
use App\Livewire\Expenses\AllExpenses;
use App\Livewire\Expenses\EditExpenses;
use App\Livewire\Investments\InvestmentAdd;
use App\Livewire\Investments\InvestmentEdit;
use App\Livewire\Investments\InvestmentIndex;
use App\Livewire\Notifications\NotificationIndex;
use App\Livewire\Payments\PaymentCreate;
use App\Livewire\Payments\PaymentEdit;
use App\Livewire\Payments\PaymentIndex;
use App\Livewire\Payments\Status;
use App\Livewire\Profile;
use App\Livewire\Profit\ProfitAdd;
use App\Livewire\Profit\ProfitEdit;
use App\Livewire\Profit\ProfitIndex;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\UserIndex;
use Illuminate\Support\Facades\Artisan;
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
    Route::get('/change-password/{id}', ChangePassword::class)->name('change.password');
    Route::get('/edit-profile/{id}', EditProfile::class)->name('edit.profile');
    Route::get('/calculator', CalculatorIndex::class)->name('basic.calculator');
    Route::get('/users', UserIndex::class)->name('user.index');
    Route::get('/notifications', NotificationIndex::class)->name('notification.index');


    // expenses
    Route::get('/all-expenses', AllExpenses::class)->name('expense.index');
    Route::get('/add-expense', AddExpenses::class)->name('expense.add');
    Route::get('/edit-expense/{id}', EditExpenses::class)->name('expense.edit');


    // Investment
    Route::get('/all-investment', InvestmentIndex::class)->name('investment.index');
    Route::get('/add-investment', InvestmentAdd::class)->name('investment.add');
    Route::get('/edit-investment/{id}', InvestmentEdit::class)->name('investment.edit');

    // Profit
    Route::get('/all-profit', ProfitIndex::class)->name('profit.index');
    Route::get('/add-profit', ProfitAdd::class)->name('profit.add');
    Route::get('/edit-profit/{id}', ProfitEdit::class)->name('profit.edit');

    // payments
    Route::get('pay', PaymentCreate::class)->name('pay.add');
    Route::get('transactions', PaymentIndex::class)->name('pay.index');
    Route::get('edit-payment/{id}', PaymentEdit::class)->name('pay.edit');
    Route::get('/all-transactions', Status::class)->name('pay.status');

    // Admin-only routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/add-user', UserCreate::class)->name('user.create');
        Route::get('/add-kitta', AddKitta::class)->name('add.kitta');
        Route::get('/edit-user/{id}', UserEdit::class)->name('user.edit');
    });

    // User-only routes (if different from admin, otherwise skip this)
    Route::middleware('role:user')->group(function () {});
});


Route::get('storage', function () {
    Artisan::call('storage:link');
});
