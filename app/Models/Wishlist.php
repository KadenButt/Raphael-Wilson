<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    // Define the table name
    protected $table = 'wishlist';

    // Define the primary key
    protected $primaryKey = 'wishlist_id';

    // Disable timestamps (created_at and updated_at)
    public $timestamps = false;

    // Define the fillable fields
    protected $fillable = ['user_id', 'product_id'];

    // Relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to the Product model
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}