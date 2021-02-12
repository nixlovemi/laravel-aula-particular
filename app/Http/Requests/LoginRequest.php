<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'    => ['required', 'email:rfc,dns', 'max:255', 'filled'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'regex:/^(?=.*\d)(?=.*[A-Z])(?!.*[^a-zA-Z0-9@#$^+=])(.{8,255})$/'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O email é obrigatório.',
            'email.email'    => 'O email é inválido.',
            'email.max'      => 'O email deve conter no máximo 150 caracteres.',
            'email.filled'   => 'O email deve ser preenchido.',

            'password.required' => 'A senha é obrigatória.',
            'password.string'   => 'A senha tem que ser do tipo string.',
            'password.min'      => 'A senha deve ter no mínimo 8 caracteres.',
            'password.max'      => 'A senha deve ter no máximo 30 caracteres.',
            'password.regex'    => 'A senha deve ter no mínimo 8 caracteres, uma letra maíuscula e um número',
        ];
    }
}
