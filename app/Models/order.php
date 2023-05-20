<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=[ ' name','phone'];

    public function orderdetail(){
        return $this->hasMany('App\Models\order_details');
      } 
}
