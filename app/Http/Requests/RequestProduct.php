<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'pr_name' => 'required | unique:products,pr_name,'.$this->id,
            'tp_id' => 'required',
            'br_id' => 'required',
            'pr_img' => 'required',
            'pr_ingredent' => 'required',
            'pr_uses' => 'required',
            'pr_instruction_for_use' => 'required',
            'pr_price' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'pr_name.required'=>'Vui lòng nhập tên sản phẩm',
            'pr_name.unique' => 'Tên sản phẩm đã tồn tại',
            'br_id.required'=>'Vui lòng chọn thương hiệu sản phẩm',
            'tp_id.required'=>'Vui lòng chọn loại sản phẩm',
            'pr_img.required' => 'Vui lòng thêm ảnh sản phẩm',
            'pr_ingredent.required' => 'Vui lòng thêm thành phần sản phẩm',
            'pr_uses.required' => 'Vui lòng thêm công dụng của sản phẩm',
            'pr_instruction_for_use.required' => 'Vui lòng thêm hướng dẫn sử dụng',
            'pr_price.required'=>'Vui lòng nhập giá sản phẩm',


        ];
    }
}
