<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'categories' => $this->categories()->pluck('id'),
            'subcategories' => $this->subcategories()->pluck('id'),
            'image' => env('APP_URL') . $this->image,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'weight' => $this->weight,
        ];
    }
}
