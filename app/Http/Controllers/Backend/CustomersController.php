<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function customers(){
        $customer = Customer::all();
        return view('backend.contents.customers.customers-list',compact('customer'));
    }

    public function addCustomer(){

        return view('backend.contents.customers.addcustomer-list');

    }
    public function createCustomer(Request $request){

        Customer::create([
            'f_name'=>$request->f_name,
            'l_name'=>$request->l_name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone
        ]);
        return redirect()->route('addCustomer.list')->with('success-message','Customer successfully created.');
    }
    public function delete($id) {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->back();
    }
    // public function editcustomer() {
    //     $customer = Customer::find();
    //     return view('backend.contents.customers.edit',compact('customer'));


    // }
}
