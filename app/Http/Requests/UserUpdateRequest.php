<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'name' => 'max:255',
            'email' => 'email|unique:users',
            'point' => 'numeric|min:0',
            'age' => 'numeric|min:0',
            'role_id' => 'numeric',
            'password' => 'min:6'
        ];
    }
}
