<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestBrand extends FormRequest
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
            'name'=>'required | unique:brands,br_name,'.$this->id ,
            'origin' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên thương hiệu',
            'name.unique' => 'Tên thương hiệu đã tồn tại.',
            'origin.required' => 'Vui lòng nhập xuất xứ của thương hiệu'
        ];
    }
}
