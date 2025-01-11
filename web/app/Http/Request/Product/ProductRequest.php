<?php

namespace App\Http\Request\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'thumb' => 'required',
            'price' => 'required|numeric|gt:0',
            'stock' => 'required|integer|gt:0',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'thumb.required' => 'Ảnh sản phẩm không được để trống.',
            'thumb.image' => 'Ảnh sản phẩm phải là một file hình ảnh hợp lệ.',
            'price.required' => 'Giá sản phẩm không được để trống.',
            'price.numeric' => 'Giá sản phẩm phải là một số.',
            'price.gt' => 'Giá sản phẩm phải lớn hơn 0.',
            'stock.required' => 'Số lượng sản phẩm không được để trống.',
            'stock.integer' => 'Số lượng sản phẩm phải là số nguyên.',
            'stock.gt' => 'Số lượng sản phẩm phải lớn hơn 0.',
        ];
    }
}