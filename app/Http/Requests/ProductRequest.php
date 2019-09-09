<?php

namespace App\Http\Requests;

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
            //
            'product_name'=>"required",
            'product_code'=>"required",
            'product_color'=>"required",
            'price'=>"required",
            'brand'=>'required',
            'discount'=>"required|numberic|gte:0|lte:100",
            'image'=>"required"
        ];
    }
}
