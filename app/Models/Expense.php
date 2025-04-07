<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model {
    use HasFactory;

    protected $table = 'expense';
    protected $primaryKey = 'expense_id';
    public $timestamps = false;
    protected $fillable = ['user_id', 'category_id', 'description', 'amount', 'date'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(ExpenseCategory::class, 'category_id');
    }
}
