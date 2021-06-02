<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function expensesCategories(){
        return $this->belongsTo(ExpensesCategory::class,'expenseCategory_id','id');
    }
}
