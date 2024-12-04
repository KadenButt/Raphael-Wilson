<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    protected $table = 'size';
    protected $primaryKey = 'size_id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['size_number'];
}


