<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingsGoal extends Model
{
    use HasFactory;

    protected $table = 'savingsgoal';
    protected $primaryKey = 'savings_goal_id';

    public $timestamps = false;

    protected $fillable = ['description', 'amount', 'created_date', 'start_date', 'end_date', 'user_id'];

    const CREATED_AT = 'created_date';
    const UPDATED_AT = null;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function incomes()
    {
        return $this->hasMany(Income::class, 'user_id', 'user_id')
            ->whereDate('date', '>=', $this->start_date)
            ->whereDate('date', '<=', $this->end_date);
    }
    
    public function expenses()
    {
        return $this->hasMany(Expense::class, 'user_id', 'user_id')
            ->whereBetween('date', [$this->start_date, $this->end_date]);
    }

    public function getTotalIncomeAttribute()
    {
        return $this->incomes->sum('amount') ?? 0;
    }

    public function getTotalExpensesAttribute()
    {
        return $this->expenses->sum('amount') ?? 0;
    }

    public function getCalculatedSavingsAttribute()
    {
        return $this->total_income - $this->total_expenses;
    }
}
