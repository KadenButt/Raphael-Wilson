<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $primaryKey = 'inventory_id'; 

    public $timestamps = false;


    protected $fillable = ['inventory_changes_date', 'inventory_changes_number', 'stock_id', 'customer_id'];

    protected $hidden = [ 'remember_token'];
}
