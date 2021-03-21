<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name' => 'required|max:50',
            'description'=> 'required'
        ];
    }

    public function  messages()
    {
        return [
            'name.required' => 'Phải nhập tên danh mục',
            'description.required' => 'Phải nhập mô tả danh mục',
            'name.max' => 'Tên danh mục tối đa 50 ký tự'
        ];
    }
}
