<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends StoreUserRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules['password'] = [
            'nullable', //indica que não é obrigatório informar 
            'min:6', //quantidade minima que a senha pode ter 
            'max:20', //quantidade máxima que a senha pode ter
        ];
        return $rules;
    }
}
