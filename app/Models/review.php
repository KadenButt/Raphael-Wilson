<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    protected $primaryKey = 'review_id';
    public $timestamps = false;
    protected $fillable = ['review_rating', 'review_comment', 'review_data', 'product_id', 'customer_id'];

}
