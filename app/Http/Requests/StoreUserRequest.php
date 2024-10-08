<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool //permissão para fazer a ação ou não
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array //em rules é listado tudo que deve ser validado 
    {
        return [
            'name' => 'required|string|min:3|max:250',
            'email' => [
                'required',
                'email',
                //'unique:users,email',
                Rule::unique('users', 'email')->ignore($this->user, 'id'), //ignora o email que estiver sendo editado
            ],
            'password' => [
                'required',
                'min:6',
                'max:20',
            ]
        ];
    }
}
