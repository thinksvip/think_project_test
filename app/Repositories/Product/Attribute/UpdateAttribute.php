<?php

namespace App\Repositories\Product\Attribute;

use App\Models\Product\Attribute;
use App\Repositories\BaseRepository;

class UpdateAttribute extends BaseRepository
{
    public function rules()
    {
        return [
            'attribute_id' => 'required|integer|exists:attributes,id',
            'attribute_name' => 'required|string|max:50|unique_with:attributes,enterprise_id,attribute_name',
            'specs' => 'json',
            'is_disable' => [is_create() ? 'required' : 'filled', 'boolean'],

        ];
    }

    public function execute(array $data) : Attribute
    {
        $this->validate($data);

    }
}
