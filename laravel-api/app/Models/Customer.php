<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'shipping_address', 'customer_category_id', 'user_id'
    ];

    public function customerCategory() {
        return $this->belongsTo(CustomerCategory::class);
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
