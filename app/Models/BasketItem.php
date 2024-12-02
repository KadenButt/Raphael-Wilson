<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasketItem extends Model
{
    protected $table = 'basket_item';
    protected $primaryKey = 'basket_item_id'; 
    public $timestamps = false;
    protected $fillable = ['basket_id', 'product_id'];

}
