<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sizeItem extends Model
{
    protected $table = 'size_item';
    protected $primaryKey = 'size_item_id';
    public $timestamps = false;
    protected $fillable = ['product_id', 'size_id'];

}
