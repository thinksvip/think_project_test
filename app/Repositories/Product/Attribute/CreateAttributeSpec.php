<?php

namespace App\Repositories\Product\Attribute;

use App\Models\Product\AttributeSpec;
use App\Repositories\BaseRepository;

class CreateAttributeSpec extends BaseRepository
{
    public function rules()
    {
        return [
            'attribute_id' => 'required|integer|exists:attributes,id',
            'spec_name' => 'required|string|max:50|unique_with:attribute_specs,attributes_id,spec_name',
        ];
    }

    public function execute(array $data) : AttributeSpec
    {
        $this->validate($data);

        $spec = AttributeSpec::create([
            'attribute_id' => $data['attribute_id'],
            'spec_name' => $data['spec_name'],
        ]);

        return AttributeSpec::find($spec->id);
    }

    //
}
