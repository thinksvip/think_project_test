<?php

namespace App\Http\Requests\Auth;

use App\Rules\Auth\Mobile;
use Illuminate\Foundation\Http\FormRequest;

class AuthenticateRequest extends FormRequest
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
            'mobile' => ['required','integer', new Mobile],
            'password' => 'required|string|min:6|max:15',
        ];
    }
}
