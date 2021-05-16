<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUser extends FormRequest
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
            'name' => 'required|unique:users,name,'.$this->id
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên thành viên không được để trống.',
            'name.unique' => 'Tên thành viên đã tồn tại.',
        ];
    }
}
