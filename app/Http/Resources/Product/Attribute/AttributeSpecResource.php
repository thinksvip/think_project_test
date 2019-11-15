<?php

namespace App\Http\Resources\Product\Attribute;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeSpecResource extends JsonResource
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
            'id' => $this->id,
            'attribute_name' => $this->attribute_name,
            'specs' => AttributeSpecResource::collection($this->whenLoaded('specs')),
            'is_disable' => $this->is_disable,
        ];
    }
}
