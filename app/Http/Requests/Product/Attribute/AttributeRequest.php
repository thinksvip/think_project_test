<?php

namespace App\Http\Requests\Product\Attribute;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
            'attribute_name' => 'required|string|max:50|unique_with:attributes,enterprise_id,attribute_name',
            'specs' => 'json',
            'is_disable' => [is_create() ? 'required' : 'filled', 'boolean'],
        ];
    }
}
