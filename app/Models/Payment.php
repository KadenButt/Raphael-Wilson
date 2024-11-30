<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;
    protected $table = 'payment';
    protected $primaryKey = 'payment_id'; 


    protected $fillable = ['account_number'];
}
