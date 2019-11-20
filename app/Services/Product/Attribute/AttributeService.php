<?php

namespace App\Services\Product\Attribute;

use App\Models\Product\Attribute;
use App\Models\Product\AttributeSpec;
use App\Repositories\Product\Attribute\CreateAttributeSpec;
use App\Repositories\Product\Attribute\UpdateAttribute;
use App\Repositories\Product\Attribute\UpdateAttributeSpec;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AttributeService
{

    protected $model;

    public function __construct(Attribute $attribute)
    {
        $this->model = $attribute;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function update($attributes)
    {
        DB::transaction(function () use ($attributes){
            //更新Attribute
            app(UpdateAttribute::class)->execute($attributes);
            //更新Specs
            if (isset($attributes['specs'])){

                $specs = json_decode($attributes['specs'],true);

                $all_ids = array_map(function ($spec) {
                    if (isset($spec['id'])){
                        $upSpecId = app(UpdateAttributeSpec::class)->execute($spec);
                        return $upSpecId->id;
                    } else {
                        $createSpecId = app(CreateAttributeSpec::class)->execute($spec);
                        return $createSpecId->id;
                    }
                },$specs);
                //移除删除Spec
                \app(AttributeSpec::class)->where('attribute_id',$attributes['attribute_id'])->whereNotIn('id', array_filter($all_ids))->delete();
            }

        });
        return Attribute::findOrfail($attributes['attribute_id']);
    }

}
