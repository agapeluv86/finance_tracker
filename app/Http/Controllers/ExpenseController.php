<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::where('user_id', Auth::id())->get();
        $totalExpense = $expenses->sum('amount');

        return view('expense.index', compact('expenses', 'totalExpense'));
    }

    public function adminindex()
    {
        $expenses = Expense::with('category', 'user')->get(); 
        return view('admin.expense', compact('expenses'));
    }

    public function create()
    {
        $expenseCategories = ExpenseCategory::where('status', 'active')->get(); 
        return view('expense.create', compact('expenseCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:expensecategory,category_id',
            'date' => 'required|date',
        ]);

        Expense::create([
            'user_id' => Auth::id(),
            'description' => $request->description,
            'amount' => $request->amount,
            'category_id' => $request->category_id,
            'date' => $request->date,
        ]);

        return redirect()->route('expense.index')->with('good_msg', 'Expense added successfully!');
    }

    public function edit($expense_id)
    {
        $expense = Expense::findOrFail($expense_id);
        $expense_categories = ExpenseCategory::where('status', 'active')->get(); 
        return view('expense.edit', compact('expense', 'expense_categories'));
    }
    
    public function update(Request $request, $expense_id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'category_id' => 'required|exists:expensecategory,category_id', 
        ]);
    
        $expense = Expense::findOrFail($expense_id);
        $expense->fill([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
            'category_id' => $request->category_id,
        ])->save();
    
        return redirect()->route('expense.index', $expense_id)->with('good_msg', 'Expense updated successfully!');
    }
    
    public function destroy($expense_id)
    {
        Expense::where('expense_id', $expense_id)->where('user_id', Auth::id())->delete();
        return redirect()->route('dashboard')->with('good_msg', 'Expense deleted successfully!');
    }
}
