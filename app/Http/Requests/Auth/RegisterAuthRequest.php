<?php

namespace App\Http\Requests\Auth;

use App\Rules\Auth\Mobile;
use Illuminate\Foundation\Http\FormRequest;

class RegisterAuthRequest extends FormRequest
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
            'name' => 'required|unique:users',
            'nikename' => 'string',
            'email' => 'email|unique:users',
            'mobile' => ['required','unique:users', new Mobile],
            'password' => 'required|string|min:6|max:15',
        ];
    }
}
