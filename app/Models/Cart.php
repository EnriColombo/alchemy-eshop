<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'purchased'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function purchase() {
        return $this->hasOne(Purchase::class);
    }

    public function cartTotal() {
        $total = 0;
        foreach ($this->cartItems as $item) {
            $total += $item->product->price;
        }
        return $total;
    }

    public function itemsCount() {
        return $this->cartItems->count();
    }
}
