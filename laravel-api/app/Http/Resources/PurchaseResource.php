<?php

namespace App\Http\Resources;

use App\Models\Cart;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class PurchaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'  => $this->id,
            'cart' => new CartResource(Cart::find($this->cart_id)),
            'date' => Carbon::parse($this->date)->format('d.m.Y'),
            'total' => $this->total,
            'method' => $this->method,
            'cardname' => $this->cardname,
            'cardnumber' => $this->cardnumber,
            'cardexpiration' => Carbon::parse($this->cardexpiration)->format('d.m.Y'),
            'cardcvv' => $this->cardcvv
        ];
    }
}
