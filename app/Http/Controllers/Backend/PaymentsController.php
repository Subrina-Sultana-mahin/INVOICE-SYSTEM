<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function payments(){
        $invoice = Invoice::whereNotIn('id', function($query){
            $query->from('payments')->select('invoice_id')
            ->where('status','Paid')->get();
        })->get();
        $payment = Payment::all();
        return view('backend.contents.payments.payments-list',compact('invoice','payment'));
    }
    public function createPayments(Request $request)
    {
        $invoice = Invoice::find($request->invoice_id);
        $payment = Payment::where('invoice_id',$request->invoice_id)->first();

        if($request->paidAmount > $invoice->total_amount){
            return redirect()->back()->with('error-message','Payment amount can not be more then total amount.');
        }
        if ($payment) {
            if ($request->paidAmount>$payment->dueAmount) {
                return redirect()->back()->with('error-message','Payment amount can not be more then total amount.');
            }
        }

        if($payment){
            if ($payment->dueAmount == $request->paidAmount) {
                $payment->update([
                    'paidAmount' => $payment->paidAmount + $request->paidAmount,
                    'dueAmount' => 0,
                    'status' => 'Paid'
                ]);
            }else{
                $payment->update([
                    'paidAmount' => $payment->paidAmount + $request->paidAmount,
                    'dueAmount' => $invoice->total_amount - ($payment->paidAmount + $request->paidAmount)
                ]);
            }

        }
        elseif ($invoice->total_amount == $request->paidAmount){
            Payment::create([
                'invoice_id'=> $request->invoice_id,
                'paidAmount' => $request->paidAmount,
                'dueAmount' => 0,
                'status' => 'Paid'
            ]);
        }
        else{
            Payment::create([
                'invoice_id'=> $request->invoice_id,
                'paidAmount' => $request->paidAmount,
                'dueAmount' => $invoice->total_amount - $request->paidAmount
            ]);
        }


        return redirect()->back();
    }
    public function delete($id) {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->back();
    }
}
