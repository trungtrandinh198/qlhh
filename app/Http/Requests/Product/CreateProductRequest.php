<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'description' => 'required',
            'price' => 'required',
            'category' => 'required'
        ];
    }

    public function  messages()
    {
        return [
            'name.required' => 'Phải tên sản phẩm',
            'description.required' => 'Phải nhập mô tả sản phẩm',
            'price.required' => 'Phải nhập giá của sản phẩm',
            'category.required' => 'Phải chọn danh mục sản phẩm',
            'name.max' => 'Tên sản phẩm tối đa 50 ký tự'
        ];
    }
}
