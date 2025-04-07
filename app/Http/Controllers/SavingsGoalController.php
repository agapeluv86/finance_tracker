<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavingsGoal;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SavingsGoalController extends Controller
{
    

        public function index()
    {
        $user_id = Auth::id(); 
        $goals = SavingsGoal::where('user_id', $user_id)->get(); 

        $total_savings = 0; 
        $total_income = 0; 
        $total_expenses = 0; 
        $today = Carbon::today();

        foreach ($goals as $goal) {
            $start_date = Carbon::parse($goal->start_date);
            $end_date = Carbon::parse($goal->end_date);

        
            $goal->total_income = Income::where('user_id', $user_id)
                ->whereBetween('date', [$goal->start_date, $goal->end_date])
                ->sum('amount');

            $goal->total_expenses = Expense::where('user_id', $user_id)
                ->whereBetween('date', [$goal->start_date, $goal->end_date])
                ->sum('amount');

            
            $goal->calculated_savings = $goal->total_income - $goal->total_expenses;

        
            $goal->remaining_amount = $goal->amount - $goal->calculated_savings;

            
            $total_savings += $goal->calculated_savings;
            $total_income += $goal->total_income;
            $total_expenses += $goal->total_expenses;

            
            if ($today->lt($start_date)) {
                $goal->status = 'Not Started';
            } elseif ($today->between($start_date, $end_date)) {
                $goal->status = 'In Progress';
            } else {
                $goal->status = 'Completed';
            }

            
            if ($goal->calculated_savings >= $goal->amount) {
                $goal->highlight_class = 'bg-success text-white'; 
            } elseif ($goal->calculated_savings > 0) {
                $goal->highlight_class = 'bg-warning text-dark'; 
            } else {
                $goal->highlight_class = 'bg-danger text-white'; 
            }
        }

        return view('savings.index', compact('goals', 'total_savings', 'total_income', 'total_expenses'));
    }
    

    private function calculateSavings($user_id, $start_date, $end_date)
    {
        $totalIncome = Income::where('user_id', $user_id)
            ->whereBetween('date', [$start_date, $end_date])
            ->sum('amount');

        $totalExpenses = Expense::where('user_id', $user_id)
            ->whereBetween('date', [$start_date, $end_date])
            ->sum('amount');

        return $totalIncome - $totalExpenses;
    }

    public function adminIndex()
    {
        $savingsGoals = SavingsGoal::with('user')->get();
        $today = Carbon::today();

        foreach ($savingsGoals as $goal) {
            $start_date = Carbon::parse($goal->start_date);
            $end_date = Carbon::parse($goal->end_date);

            
            $goal->total_income = Income::where('user_id', $goal->user_id)
                ->whereBetween('date', [$goal->start_date, $goal->end_date])
                ->sum('amount');

            $goal->total_expenses = Expense::where('user_id', $goal->user_id)
                ->whereBetween('date', [$goal->start_date, $goal->end_date])
                ->sum('amount');

            
            $goal->calculated_savings = $goal->total_income - $goal->total_expenses;

            
            $goal->remaining_amount = max($goal->amount - $goal->calculated_savings, 0);

            
            if ($today->lt($start_date)) {
                $goal->status = 'Not Started';
            } elseif ($today->between($start_date, $end_date)) {
                $goal->status = 'In Progress';
            } else {
                $goal->status = 'Completed';
            }

            
            if ($goal->calculated_savings >= $goal->amount) {
                $goal->highlight_class = 'bg-success text-white';
            } elseif ($goal->calculated_savings > 0) {
                $goal->highlight_class = 'bg-warning text-dark';
            } else {
                $goal->highlight_class = 'bg-danger text-white';
            }
        }

        return view('admin.savings', compact('savingsGoals'));
    }

    public function create()
    {
        return view('savings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        SavingsGoal::create([
            'user_id' => Auth::id(),
            'description' => $request->description,
            'amount' => $request->amount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('savings.index')->with('good_msg', 'Savings goal added successfully.');
    }

    public function edit($savings_goal_id)
    {
        $savingsGoal = SavingsGoal::findOrFail($savings_goal_id);
        return view('savings.edit', compact('savingsGoal'));
    }

    public function update(Request $request, $savings_goal_id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $savingsGoal = SavingsGoal::findOrFail($savings_goal_id);
        $savingsGoal->update($request->all());

        return redirect()->route('savings.index', $savings_goal_id)->with('success', 'Savings goal updated successfully');
    }

    public function destroy($savings_goal_id)
    {
        $savingsGoal = SavingsGoal::findOrFail($savings_goal_id);
        $savingsGoal->delete();

        return redirect()->route('dashboard')->with('success', 'Savings goal deleted successfully');
    }
}
