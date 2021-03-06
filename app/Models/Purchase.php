<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'date',
        'total',
        'method',
        'cardname',
        'cardnumber',
        'cardexpiration',
        'cardcvv'
    ];

    public function cart() {
        return $this->belongsTo(Cart::class);
    }
}
