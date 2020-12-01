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
            'username' => $this->name, // TODO cambiare in $this->username
            'email' => $this->email,
//            'first_name' => $this->first_name,
//            'last_name' => $this->last_name,
            'category' => new CustomerCategoryResource(CustomerCategory::find($this->customer_category_id))
        ];
    }
}
