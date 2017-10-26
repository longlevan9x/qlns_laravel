<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;
class UserRequest extends FormRequest
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
            'name'      => 'required',
            'username'  => 'required|unique:users',
            'password'  => 'required|min:6',
            'people_id' => 'required',
            'email'     => 'check_email',
            'password_confirm' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'email.check_email' => 'Email invalid',
        ];
    }
}