<?php

namespace App\Http\Resources;

use App\Models\CustomerCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'username' => $this->username,
            'email' => $this->email,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'category' => new CustomerCategoryResource(CustomerCategory::find($this->customer_category_id)),
            'address' => $this->address,
            'shipping_address' => $this->shipping_address,
            'zip' => $this->zip,
            'city' => $this->city,
            'country' => $this->country,
        ];
    }
}
