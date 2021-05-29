<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function itemDetails(){
        return $this->belongsTo(Product::class,'item_id','id');
    }
}
