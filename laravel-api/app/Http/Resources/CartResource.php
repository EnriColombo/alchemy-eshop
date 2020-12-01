<?php

namespace App\Http\Resources;

use App\Models\CartItem;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $cartItemsCollection = CartItemResource::collection($this->cartItems);
        return [
            'id'  => $this->id,
            'customer_id'  => $this->customer_id,
            'items' => $cartItemsCollection,
            'items_no' => $cartItemsCollection->count(),
            'total' => number_format($this->cartTotal(), 2)
        ];
    }
}
