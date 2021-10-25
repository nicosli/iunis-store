<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->hash,
            'name' => $this->name,
            'image' => $this->image,
            'public_price' => $this->public_price,
            'description' => $this->description,
            'stars' => $this->stars,
            'reviews' => $this->reviews,
        ];
    }
}