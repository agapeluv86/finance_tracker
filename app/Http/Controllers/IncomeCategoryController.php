<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeCategory;

class IncomeCategoryController extends Controller
{
    public function index()
    {
        $categories = IncomeCategory::all();
        return view('admin.income_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.income_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:incomecategory',
        ]);

        IncomeCategory::create([
            'name' => $request->name,
            'status' => 'active',
        ]);

        return redirect()->route('admin.income_categories.index')->with('good_msg', 'Income category added successfully.');
    }

    public function edit($category_id)
    {
        $category = IncomeCategory::findOrFail($category_id);
        return view('admin.income_categories.edit', compact('category'));
    }

    public function update(Request $request, $category_id)
    {
        $request->validate([
            'name' => 'required|string|unique:incomecategory,name,' . $category_id . ',category_id',
        ]);
        

        $category = IncomeCategory::findOrFail($category_id);
        $category->update(['name' => $request->name]);

        return redirect()->route('admin.income_categories.index')->with('good_msg', 'Income category updated successfully.');
    }
   
    public function status(Request $request)
 {
    $request->validate([
        'category_id' => 'required|exists:incomecategory,category_id',
        'status' => 'required|in:active,inactive',
    ]);
    
    $category = IncomeCategory::findorFail($request->category_id);
    $category->status = $category->status === 'active' ? 'disabled' : 'active';
    $category->save();

    return redirect()->route('admin.income_categories.index')
        ->with('good_msg', 'Category status updated successfully.');
  }
}
