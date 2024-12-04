<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'order_id'; 
    public $timestamps = false;
    protected $fillable = ['order_date', 'order_status', 'order_total_price', 'customer_id'];
}
