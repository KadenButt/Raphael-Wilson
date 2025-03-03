<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = 'basket';
    protected $primaryKey = 'basket_item_id'; 
    public $timestamps = false;
    protected $fillable = ['customer_id', 'item_id', 'quantity'];

}
