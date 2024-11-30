<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $primaryKey = 'address_id'; 

    public $timestamps = false;

    protected $fillable = ['address_number', 'address_street', 'address_postcode',];


}
