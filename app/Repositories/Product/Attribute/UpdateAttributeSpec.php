<?php

namespace App\Repositories\Product\Attribute;

use App\Models\Product\AttributeSpec;
use App\Repositories\BaseRepository;

class UpdateAttributeSpec extends BaseRepository
{
    public function rules()
    {
        return [
            'id' => 'required|integer|exists:attribute_specs,id',
            'attribute_id' => 'required|integer|exists:attributes,id',
            'spec_name' => [is_create() ? 'unique_with:attribute_specs,attributes_id,spec_name' : 'filled','required','string','max:50'],
        ];
    }

    public function execute(array $data) : AttributeSpec
    {
        $this->validate($data);

        $specName = AttributeSpec::findOrfail($data['id']);
        $specName->update([
            'spec_name' => $data['spec_name'],
        ]);
        return $specName;
    }
}
