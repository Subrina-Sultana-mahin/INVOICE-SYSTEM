<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpensesCategory;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function expenses()
    {
        $expenses = Expense::all();
        return view('backend.contents.expenses.expenses-list', compact('expenses'));
    }
    public function addExpenses()
    {
        $expensesCategory = ExpensesCategory::all();
        return view('backend.contents.expenses.addexpenses-list',compact('expensesCategory'));
    }

    public function expensesCategory()
    {
        $expensesCategory = ExpensesCategory::all();

        return view('backend.contents.expensesCategory.expensesCategory-list', compact('expensesCategory'));
    }
    public function addExpensesCategory()
    {

        return view('backend.contents.expensesCategory.addexpensescategory-list');
    }

    public function createExpenses(Request $request)
    {

        Expense::create([
            'expenseCategory_id' => $request->expenseCategory_id,
            'price' => $request->price,
            'date' => $request->date
        ]);
        return redirect()->route('expenses.list')->with('success-message', 'Expenses successfully created.');
    }
    public function createExpensesCategory(Request $request)
    {
        ExpensesCategory::create([
            'e_name' => $request->e_name,
            'description' => $request->description,
            'date' => $request->date
        ]);
        return redirect()->route('expensesCategory.list')->with('success-message', 'Expenses Category successfully created.');
    }



    public function delete($id)
    {
        $expenses = Expense::find($id);
        $expenses->delete();

        return redirect()->back();
    }
    public function expensesCategorydelete($id)
    {
        $expensesCategory = ExpensesCategory::find($id);
        $expensesCategory->delete();

        return redirect()->back();
    }

}
