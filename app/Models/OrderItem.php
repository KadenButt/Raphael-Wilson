<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_item';
    protected $primaryKey = 'order_item_id'; 
    public $timestamps = false;
    protected $fillable = ['order_item_quantity', 'order_item_price', 'item_id', 'order_id'];
}
