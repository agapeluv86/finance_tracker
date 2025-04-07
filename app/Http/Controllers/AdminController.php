<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\IncomeCategory;
use App\Models\Income;
use App\Models\ExpenseCategory;
use App\Models\Expense;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }


    public function users()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users', compact('users'));
    }
   

//     public function showPinForm()
//  {
//     return view('admin.verify_pin');
//  }

//    public function checkPin(Request $request)
//   {
//     $user = Auth::user();

//     if (!$user || !Hash::check($request->admin_pin, $user->admin_pin)) {
//         return redirect()->route('admin.verifyPin')->with('error', 'Invalid PIN. Access denied.');
//     }

//     session(['admin_verified' => true]); 
//     return redirect()->route('admin.users');
//  }

    
    public function promote($userId)
 {
    if (Auth::user()->role !== 'super_admin') {
        return redirect()->route('admin.users')->with('error', 'You do not have permission to promote users.');
    }

    $user = User::findOrFail($userId);
    $user->update(['role' => 'admin']);

    Auth::logout();
    return redirect()->route('login')->with('success', 'User has been upgraded to admin. Please log in again.');
}



    public function income()
    {
        $incomes = Income::with(['category', 'user'])->get();
        return view('admin.income', compact('incomes'));
    }

    
    public function expense()
    {
        $expenses = Expense::with(['category', 'user'])->get();
        return view('admin.expense', compact('expenses'));
    }


    public function incomeCategory()
    {
        $categories = IncomeCategory::all();
        return view('admin.income_categories.index', compact('categories'));
    }

    
    public function expenseCategory()
    {
        $expenseCategories = ExpenseCategory::all();
        return view('admin.expense_categories.index', compact('expenseCategories'));
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
