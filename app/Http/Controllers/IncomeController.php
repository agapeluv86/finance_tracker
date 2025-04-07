<?php


namespace App\Http\Controllers;
use App\Models\Income;
use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::where('user_id', Auth::id())->get();
        $total_income = $incomes->sum('amount');

        return view('income.index', compact('incomes', 'total_income'));
    }

    public function adminIndex()
    {
        $incomes = Income::with('category', 'user')->get();
        return view('admin.income', compact('incomes'));
    }

    
    public function create()
    {
        $income_categories = IncomeCategory::where('status','active')->get(); 

        return view('income.create', compact('income_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'category_id' => 'required|exists:incomecategory,category_id',
        ]);

        Income::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('income.index')->with('good_msg', 'Income added successfully.');

    }
    public function edit($income_id)
    {
        $income = Income::findOrFail($income_id);
        $income_categories = IncomeCategory::where('status', 'active')->get();
        
        return view('income.edit', compact('income', 'income_categories'));
    }

    public function update(Request $request, $income_id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'category_id' => 'required|exists:incomecategory,category_id',
        ]);

        $income = Income::findOrFail($income_id);
        $income->update([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('income.index', $income_id)->with('success', 'Income updated successfully');
    }

    public function destroy($income_id)
    {
        income::where('income_id', $income_id)->where('user_id', Auth::id())->delete();
        return redirect()->route('dashboard')->with('good_msg', 'Income deleted successfully!');
    }
}


