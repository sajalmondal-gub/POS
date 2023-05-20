<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    use HasFactory;
    protected $table='order_details';
    protected $fillable=[ ' order_id','product_id',
                          ' unitprice ','quantity',
                          'amount','discount'];

                          public function product(){
                            return $this->belongsTo('App\Models\product');
                          }
                          public function order(){
                            return $this->belongsTo('App\Models\order');
                          }                     
}
