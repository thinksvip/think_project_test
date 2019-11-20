<?php

namespace App\Repositories\Product\Attribute;

use App\Models\Product\Attribute;
use App\Models\Product\AttributeSpec;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class UpdateAttribute extends BaseRepository
{
    public function rules()
    {
        return [
            'enterprise_id' => 'required|integer',
            'attribute_id' => 'required|integer|exists:attributes,id',
            'attribute_name' => [is_create() ? 'unique_with:attributes,enterprise_id,attribute_name' : 'filled','required','string','max:50'],
            'is_disable' => [is_create() ? 'required' : 'filled', 'boolean'],

        ];
    }

    public function execute(array $data) : Attribute
    {
        $this->validate($data);
//        DB::transaction(function () use ($data) {
            $attribute = Attribute::where('enterprise_id',$data['enterprise_id'])->findOrfail($data['attribute_id']);
            //更新attribute
            $attribute->update([
                'attribute_name' => $data['attribute_name'],
                'is_disable' => $data['is_disable'],
            ]);

            //检测是否需要更新spec
//            if(isset($data['specs'])){
//                $data['specs'] = json_decode($data['specs'],true);
//                dd($data);
//                //更新/创建新属性值
//                $all_ids = array_map(function () use ($attribute,$data){
//                    $attribute->specs()->updateOrcreate(
//                        ['id' =>$data['specs']['id']],
//                        [
//                            'spec_name' => $data['specs']['spec_name']
//                        ]);
//                    return $data['specs']['id'];
//                },$data['specs']);
////                //删除属性值
//                $attribute->specs()->whereNotIn('id', $all_ids)->delete();
//
//                foreach($data['specs'] as $spec) {
//                    $attribute->specs()->associate(AttributeSpec::find($spec['id']));
//                    $attribute->save();
//                }
//            }
//        });
        return Attribute::findOrfail($data['attribute_id']);
    }
}
