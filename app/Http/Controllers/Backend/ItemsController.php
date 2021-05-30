<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{


    public function items(){
        $item = Item::all();
        return view('backend.contents.items.items-list',compact('item'));
    }

    public function addItem(){

        return view('backend.contents.items.additem-list');

    }
    public function createItem(Request $request){

        Item::create([
            'name'=>$request->name,
            'unit'=>$request->unit,
            'price'=>$request->price,
            'date'=>$request->date
        ]);
        return redirect()->route('addItem.list')->with('success-message','Item successfully created.');
    }
    public function delete($id) {
        $item = Item::find($id);
        $item->delete();
        return redirect()->back();
    }
}
