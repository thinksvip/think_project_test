<?php

namespace App\Http\Resources\Product\Attribute;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResource extends JsonResource
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
            'attributes_id' => $this->attributes_id,
            'spec_name' => $this->spec_name,
        ];
    }
}
