<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateproductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'productname' => 'required',
            'productdesc' => 'required|min:10|max:20',
            'ProdSubCategory' => 'required',
            'image' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'productname.required' => 'product name is required',
            'productdesc.required' => 'product description is required',
            'ProdSubCategory.required' => 'category/product is required',
        ];
    }
}
