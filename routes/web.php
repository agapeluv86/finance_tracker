<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SavingsGoalController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/planning', 'planning')->name('planning');
Route::view('/income-tracking', 'income-tracking')->name('income-tracking');
Route::view('/expense-tracking', 'expense-tracking')->name('expense-tracking');
Route::view('/security', 'security')->name('security');


// User Dashboard - Prevent Admins from Accessing
Route::middleware(['auth', 'verified', 'userisblocked', 'ensureuserrole'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

 // Income 
    Route::prefix('income')->name('income.')->group(function () {
        Route::get('/', [IncomeController::class, 'index'])->name('index');
        Route::get('/create', [IncomeController::class, 'create'])->name('create');
        Route::post('/store', [IncomeController::class, 'store'])->name('store');
        Route::get('/{income_id}', [IncomeController::class, 'show'])->name('show');
        Route::get('/{income_id}/edit', [IncomeController::class, 'edit'])->name('edit');
        Route::put('/{income_id}', [IncomeController::class, 'update'])->name('update');
        Route::delete('/{income_id}', [IncomeController::class, 'destroy'])->name('destroy');

    });

    // Expense 
    Route::prefix('expense')->name('expense.')->group(function () {
        Route::get('/', [ExpenseController::class, 'index'])->name('index');
        Route::get('/create', [ExpenseController::class, 'create'])->name('create');
        Route::post('/store', [ExpenseController::class, 'store'])->name('store');
        Route::get('/{expense_id}', [ExpenseController::class, 'show'])->name('show');
        Route::get('/{expense_id}/edit', [ExpenseController::class, 'edit'])->name('edit');
        Route::put('/{expense_id}', [ExpenseController::class, 'update'])->name('update');
        Route::delete('/{expense_id}', [ExpenseController::class, 'destroy'])->name('destroy');
    });

    // Savings 
    Route::prefix('savings')->name('savings.')->group(function () {
        Route::get('/', [SavingsGoalController::class, 'index'])->name('index');
        Route::get('/create', [SavingsGoalController::class, 'create'])->name('create');
        Route::post('/store', [SavingsGoalController::class, 'store'])->name('store');
        Route::get('/edit/{savings_goal_id}', [SavingsGoalController::class, 'edit'])->name('edit');
        Route::patch('/update/{savings_goal_id}', [SavingsGoalController::class, 'update'])->name('update');
        Route::delete('/delete/{savings_goal_id}', [SavingsGoalController::class, 'destroy'])->name('delete');
    });
});


// Admin Routes (Requires Authentication)
Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [AdminController::class, 'users'])->name('users'); // Manage Users
    Route::post('/promote/{userId}', [AdminController::class, 'promote'])->name('promote');
    

    // Admin Routes (Require Admin Role)
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/income', [AdminController::class, 'income'])->name('income');
        Route::get('/expense', [AdminController::class, 'expense'])->name('expense');
        Route::get('/savings', [SavingsGoalController::class, 'adminIndex'])->name('savings');

        // Income Categories Management
        Route::prefix('income_categories')->name('income_categories.')->group(function () {
            Route::get('/', [IncomeCategoryController::class, 'index'])->name('index');
            Route::get('/create', [IncomeCategoryController::class, 'create'])->name('create');
            Route::post('/store', [IncomeCategoryController::class, 'store'])->name('store');
            Route::get('/edit/{category_id}', [IncomeCategoryController::class, 'edit'])->name('edit');
            Route::put('/update/{category_id}', [IncomeCategoryController::class, 'update'])->name('update');
            Route::put('/status/{category_id}', [IncomeCategoryController::class, 'status'])->name('status');
        });

        // Expense Categories Management
        Route::prefix('expense_categories')->name('expense_categories.')->group(function () {
            Route::get('/', [ExpenseCategoryController::class, 'index'])->name('index');
            Route::get('/create', [ExpenseCategoryController::class, 'create'])->name('create');
            Route::post('/store', [ExpenseCategoryController::class, 'store'])->name('store');
            Route::get('/edit/{category_id}', [ExpenseCategoryController::class, 'edit'])->name('edit');
            Route::put('/update/{category_id}', [ExpenseCategoryController::class, 'update'])->name('update');
            Route::post('/status/{category_id}', [ExpenseCategoryController::class, 'status'])->name('status');
        });
    });

    // Logout Route
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});


require __DIR__.'/auth.php';
