<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    
    protected $table = 'admin';
    protected $primaryKey = 'admin_id'; 

    public $timestamps = false;

    protected $fillable = ['admin_email', 'admin_password', 'admin_fname', 'admin_sname', ];

    protected $hidden = ['admin_password', 'remember_token'];
}
