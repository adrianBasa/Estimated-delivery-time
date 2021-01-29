<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTime extends Model
{
    protected $table ='order_times';
    protected $fillable = ['zip_code',	'shipmentr_date' ,'delivered_date'];
}
