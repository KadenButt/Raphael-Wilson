<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    
    protected $table = 'customer';
    protected $primaryKey = 'customer_id'; 

    public $timestamps = false;

<<<<<<< HEAD
    protected $fillable = ['customer_email', 'customer_password', 'customer_fname', 'customer_sname', 'address_id', 'payment_id','customer_question'];
=======
    protected $fillable = ['customer_email', 'customer_password', 'customer_fname', 'customer_sname', 'address_id', 'payment_id', 'admin'];
>>>>>>> admin-login

    protected $hidden = ['customer_password', 'remember_token'];

}
