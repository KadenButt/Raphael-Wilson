<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    public $incrementing = true; 
    public $timestamps = false;
    protected $fillable = ['product_name', 'product_photo', 'product_description', 'product_price', 'category_id'];
}
