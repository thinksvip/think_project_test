<?php

namespace App\Repositories\Product\Attribute;

use App\Models\Product\Attribute;
use App\Models\Product\AttributeSpec;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CreateAttribute extends BaseRepository
{
    public function rules()
    {
        return [
            'enterprise_id' => 'required|integer',
            'attribute_name' => 'required|string|max:50|unique_with:attributes,enterprise_id,attribute_name',
            'specs' => 'json',
            'is_disable' => [is_create() ? 'required' : 'filled', 'boolean'],
        ];
    }

    public function execute(array $data) : Attribute
    {
        $this->validate($data);

        DB::transaction(function () use (&$data){
            $attribute = Attribute::create([
                'attribute_name' => $data['attribute_name'],
                'enterprise_id' => $data['enterprise_id'],
                'is_disable' => $data['is_disable'],
            ]);

            if(isset($data['specs'])){
                $data['specs'] = json_decode($data['specs'],true);
                $attribute->specs()->createMany($data['specs']);
            }

            $data['id'] = $attribute->id;
        });

        return Attribute::findOrfail($data['id']);
    }
}
