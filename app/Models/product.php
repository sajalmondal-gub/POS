<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //use HasFactory;
protected $table ='products';
protected $fillable =['product_name','brand','alert_stock','price','quantity','description'];

public function orderdetail(){
    return $this->hasMany('App\Models\order_details');
  } 

}
