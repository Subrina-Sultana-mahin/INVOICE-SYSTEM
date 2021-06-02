<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Item;
use App\Models\Payment;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function invoices(){
        $list = Invoice::all();

        return view('backend.contents.invoices.invoices-list',compact('list'));
    }

    public function invoicesCreate(){
        $customer = Customer::all();
        $items= Item::where('unit', '!=' , 0)->get();
        $addItem = Cart::all();
        $totalItems = 0;
        $totalPrice = 0;
        // dd($addItem);

        foreach($addItem as $data)
        {
            $totalItems += $data->item_quantity;
            $totalPrice += $data->subtotal;
            $customer_id=$data->customer_id;
        }

        return view('backend.contents.invoices.invoice-create',compact('items','addItem','customer','totalItems','totalPrice',));
    }


    public function saleItemCreate(Request $request){

        // dd($request->all());

        $item = Item::where('id',$request->item_id)->first();
        $cart = Cart::where('item_id',$request->item_id)->first();


            if ($cart) {
                $subtotal = $request->item_quantity * $item->price;
                $cart->update([
                    'item_quantity' => $cart->item_quantity + $request->item_quantity,
                    'subtotal' => $cart->subtotal + ($subtotal)
                ]);
            } else {


                    $subtotal = $request->item_quantity * $item->price;
                Cart::create([
                    'item_id'=>$request->item_id,
                    'item_quantity'=>$request->item_quantity,
                    'price'=>$item->price,
                    'subtotal'=>$subtotal
                ]);



                $left_quantity = $item->unit - $request->item_quantity;

                $item ->update([
                    'unit'=>$left_quantity,
                ]);

            }

            return redirect()->back();
    }


    public function itemSold(Request $request){

        $invID = Invoice::orderBy('id','desc')->first()->id ?? 0;

        $invID = str_pad($invID , 4, '0', STR_PAD_LEFT);
        $item = invoice::create([
            'total_amount' => $request->total_amount,
            'customer_id' => $request->customer_id,
            'invoice_no' => $invID + 1
        ]);

        $cartData = Cart::all();

        foreach ($cartData as $data) {

            $sp = invoiceDetail::create([
                'invoice_id' => $item->id,
                'item_id' => $data->item_id,
                'price' => $data->price,
                'quantity' => $data->item_quantity,
                'subtotal' => $data->subtotal,
            ]);
            $data->delete();

        }
        // dd($sq);


        return redirect()->route('invoice.list');
    }

    public function saleItemDelete($id){
        $cartItem =Cart::find($id);

        $item = Item::where('id', $cartItem->item_id)->first();


        $left_quantity = $item->unit + $cartItem->item_quantity;
        $item->update([
            'unit' => $left_quantity
        ]);

        $cartItem->delete();


        return redirect()->route('saleItem.create');
    }
    public function delete($id) {
        $invoice = Invoice::find($id);
        try {
            $invoice->delete();
            return redirect()->back()->with('success-message','Deleted Successfully.');

        } catch (\Throwable $e) {
            if($e->getCode() == "23000"){
                return redirect()->back()->with('error-message', 'You can not delete this record, because other tables depends on it.');
            }
            return back();
        }
    }
    public function view($id) {
        $invoice = Invoice::find($id);
        $invoiceDetails = InvoiceDetail::where('invoice_id',$id)->get();
        $payment = Payment::where('invoice_id',$id)->first();
        // dd($invoiceDetails);
        return view('backend.contents.invoices.invoice-view', compact('id','invoice','invoiceDetails','payment'));

    }



}

