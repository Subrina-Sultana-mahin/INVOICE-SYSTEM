<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        return view('backend.main');
    }

    public function dashboard(){
        $users = User::all()->count();
        $customerCount = Customer::all()->count();
        $itemCount = Item::all()->count();
        $totalSale = Invoice::sum('total_amount');
        $totalExpense = Expense::sum('price');
        $todaysSale = Invoice::whereDate('created_at',carbon::today())->sum('total_amount');
        $todaysExpense = Expense::whereDate('created_at',carbon::today())->sum('price');
        $todaysPaid = Payment::whereDate('created_at',carbon::today())->sum('paidAmount');
        $todaysDue = $todaysSale - $todaysPaid;
        // dd($todaySale);
        return view('backend.contents.dashboard.dashboard',compact(
            'itemCount','customerCount','totalSale','todaysSale',
            'totalExpense','todaysExpense', 'todaysPaid','todaysDue','users'
        ));

    }
}
