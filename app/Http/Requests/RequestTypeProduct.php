<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTypeProduct extends FormRequest
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
            'tp_name' => 'required|unique:type_products,tp_name,'.$this->id,

        ];
    }
    public function messages()
    {
        return [
            'tp_name.required'=>'Vui lòng nhập tên loại sản phẩm',
            'tp_name.unique' => 'Tên loại sản phẩm đã tồn tại.',
        ];
    }

}
