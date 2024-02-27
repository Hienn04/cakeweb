<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Contracts\Validation\Validator;

class CartRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'quantity' => 'required|integer|min:1',
           
        ];
    }

    public function messages()
    {
        return [
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm',
            'quantity.integer' => 'Số lượng sản phẩm phải là kiểu số',
            'quantity.min' => 'Số lượng tối thiểu là 1',
        ];
    }

   
    public function failedValidation(Validator $validator)
    {
        
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST));
    }
}