<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $table='companies';
    protected $fillable=[ ' company_email','company_phone','company_address','company_fax'];
}
