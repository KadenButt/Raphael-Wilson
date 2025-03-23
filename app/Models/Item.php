<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'item_id';
    public $timestamps = false;
    protected $fillable = ['product_id', 'size_number','stock_number','stock_changes_date', 'stock_changes_number', ];

}
