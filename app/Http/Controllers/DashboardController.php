<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Income;
use App\Models\Expense;
use App\Models\SavingsGoal;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
    
    public function index(Request $request) {
        $userId = Auth::id();
    
        $totalIncome = Income::where('user_id', $userId)->sum('amount');
        $totalExpenses = Expense::where('user_id', $userId)->sum('amount');
        $totalSavings = SavingsGoal::where('user_id', $userId)->sum('amount');
        $remainingBalance = $totalIncome - $totalExpenses;
    
        return view('dashboard', compact('totalIncome', 'totalExpenses', 'totalSavings', 'remainingBalance'));
    }
}    