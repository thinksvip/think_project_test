<?php

namespace App\Http\Requests\Product\Attribute;

use Illuminate\Foundation\Http\FormRequest;

class AttributeSpecRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'attributes_id' => 'required|integer|exists:attributes,id',
            'spec_name' => 'required|string|max:50|unique_with:attribute_specs,attributes_id,spec_name',
        ];
    }

    public function messages()
    {
        return [
            'attributes_id.exists' => '属性值不存在',
        ];
    }
}
