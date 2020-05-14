<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'fullname'=>'required',
            'age'=>'required',
            'sex'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Không được để trống email',
            'email.email'=>'Email phải ở dạng A@gmail.com',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Không được để trống password',
            'fullname.required'=>'Không được để trống full name',
            'age.required'=>'Không được để trống age',
            'sex.required'=>'Không được để trống sex',
        ];
    }
}
