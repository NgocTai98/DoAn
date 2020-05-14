<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'productCode'=>'required|unique:product,productCode,'.$this->id,
            'productName'=>'required',
            'productPrice'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'productCode.required'=>'Không được để trống mã sản phẩm',
            'productCode.unique'=>'Mã sản phẩm này đã tồn tại',
            'productName.required'=>'Không được để trống tên sản phẩm',
            'productPrice.required'=>'Không được để trống giá sản phẩm',
        ];
    }
}
