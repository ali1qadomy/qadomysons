<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecategoryRequest extends FormRequest
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
            'categoryNameEn' => 'required|unique:categories,name',
            'categoryNameAr' => 'required|unique:categories,name',
            'categoryDescEn' => 'required',
            'categoryDescAr' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'categoryNameEn.required' => 'category name is require',
            'categoryNameEn.unique' => 'category name exists',
            'categoryNameAr.required' => 'category name is require',
            'categoryNameAr.unique' => 'category name exists',
            'categoryDescEn.required' => 'category description in english is required',
            'categoryDescAr.required' => 'category description in arabic is required'
        ];
    }
}
