<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class ApiController extends Controller
{


public function customerDetails($id)
    {
        $customer = Customer::find($id);
        $invID = Invoice::orderBy('id','desc')->first()->id ?? 1;

        $random=$invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

        return  \response()->json([
            'data'=>$customer,
            'invoice_no'=>$random
        ]);
    }
}
