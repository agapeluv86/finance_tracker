<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model {
    use HasFactory;

    protected $table = 'income';
    protected $primaryKey = 'income_id';
    public $timestamps = false;
    protected $fillable = ['user_id', 'category_id', 'description', 'amount', 'date'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(IncomeCategory::class, 'category_id');
    }
}

