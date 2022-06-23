<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorebrancheRequest extends FormRequest
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
            'BrancheNameEn'=>'required',
            'BrancheNameAr'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'BrancheNameEn.required'=>'branche name in english required',
            'BrancheNameAr.required'=>'branche name in Arabic required', 
        ];
    }
}
