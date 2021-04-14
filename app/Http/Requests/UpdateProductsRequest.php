<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductsRequest extends FormRequest
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
            'category_id'=>['required','exists:categories,id'],
            'brand_id'=>['required','exists:brands,id'],
            'name'=>['required'],
            'slug'=>['required','alpha_dash'],
            'image'=>['nullable','mimes:jpg,png,jpeg'],
            'description'=>['required'],
            'cost'=>['required','integer','min:1000']
        ];
    }
}
