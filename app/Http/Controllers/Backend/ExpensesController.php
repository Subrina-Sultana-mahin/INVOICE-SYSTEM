<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function expenses(){
        $expenses = Expense::all();
        return view('backend.contents.expenses.expenses-list',compact('expenses'));
    }
    public function addExpenses(){

        return view('backend.contents.expenses.addexpenses-list');
    }

    public function expensesCategory(){

    return view('backend.contents.expensesCategory.expensesCategory-list');
    }

    public function createExpenses(Request $request){

    Expense::create([
        'p_name'=>$request->p_name,
        'price'=>$request->price,
        'quantity'=>$request->quantity,
        'date'=>$request->date
    ]);
    return redirect()->route('addExpenses.list')->with('success-message','Expenses successfully created.');
}

}
