<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $expenseCategories = ExpenseCategory::all();  
        return view('admin.expense_categories.index', compact('expenseCategories'));
    }

    public function create()
    {
        return view('admin.expense_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|unique:expensecategory,category_name',
        ]);

        ExpenseCategory::create([
            'category_name' => $request->category_name,
            'status' => 'active',
        ]);

        return redirect()->route('admin.expense_categories.index')->with('good_msg', 'Expense category added successfully.');
    }


    public function edit($category_id)
    {
        $category = ExpenseCategory::findOrFail($category_id);
        return view('admin.expense_categories.edit', compact('category'));
    }

    public function update(Request $request, $category_id)
    {
        $category = ExpenseCategory::findOrFail($category_id);

        $request->validate([
            'category_name' => 'required|unique:expensecategory,category_name,' . $category->category_id . ',category_id',
        ]);
        
       
        $category->update(['category_name' => $request->category_name]);

        return redirect()->route('admin.expense_categories.index')->with('good_msg', 'Expense category updated successfully.');
    }

    public function updateStatus($category_id)
    {
        $category = ExpenseCategory::findOrFail($category_id);
        $category->status = ($category->status === 'active') ? 'disabled' : 'active';
        $category->save();

        return redirect()->back()->with('good_msg', 'Category status updated.');
    }
}
