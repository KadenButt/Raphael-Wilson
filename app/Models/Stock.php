<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
    protected $primaryKey = 'stock_id'; 

    public $timestamps = false;


    protected $fillable = ['stock_number', 'item_id'];

    protected $hidden = [ 'remember_token'];
}
