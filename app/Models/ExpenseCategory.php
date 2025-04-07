<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model {
    use HasFactory;

    protected $table = 'expensecategory';
    protected $primaryKey = 'category_id';
    public $timestamps = false;

    protected $fillable = ['category_name', 'status'];

    public function expenses() {
        return $this->hasMany(Expense::class, 'category_id');
    }
}

