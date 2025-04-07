<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model {
    use HasFactory;

    protected $table = 'incomecategory';
    protected $primaryKey = 'category_id';
    public $timestamps = false;

    protected $fillable = ['name', 'status'];

    public function incomes() {
        return $this->hasMany(Income::class, 'category_id');
    }


    
    public static function getActiveCategories()
    {
        return self::where('status', 'active')->get();
    }
    
    
    public static function status($category_id)
    {
        $category = self::findOrFail($category_id);
        $category->status = ($category->status === 'active') ? 'inactive' : 'active';
        return $category->save();
    }


}

