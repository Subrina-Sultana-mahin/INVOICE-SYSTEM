<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Item;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function invoices(){
        return view('backend.contents.invoices.invoices-list');
    }

    public function invoicesCreate(){
        $customer = Customer::all();
        $items= Item::all();
        $addItem = Cart::all();
        $totalItems = 0;
        $totalPrice = 0;
        foreach($addItem as $data)
        {
            $totalItems += $data->item_quantity;
            $totalPrice += $data->price;
        }
        return view('backend.contents.invoices.invoice-create',compact('items','addItem','customer','totalItems','totalPrice'));
    }


    public function saleItemCreate(Request $request){

        $item = Item::where('id',$request->item_id)->first();
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

            return redirect()->back();
    }


    public function itemSold(Request $request){
        $item = invoice::create([
            'total_amount' => $request->total_amount,
            'customer_id' => $request->customer_id,
            'invoice_no' => $request->invoice_no
        ]);

        $cartData = Cart::all();

        foreach ($cartData as $data) {

            $sp = invoiceDetail::create([
                'invoice_id' => $item->invoice_id,
                'item_id' => $data->item_id,
                'price' => $data->price,
                'quantity' => $data->item_quantity,
                'subtotal' => $data->subtotal,
            ]);

        }
        // dd($sq);

        Cart::where('customer_id', $request->customer_id)->delete();

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



}

