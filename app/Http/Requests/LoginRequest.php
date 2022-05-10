<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text_usuario' => 'required|email',
            'text_senha' => 'required|min:3|max:20'
        ];
    }

    public function messages()
    {
        return[
            'text_usuario.required' => 'O Usuário é de preenchimento obrigatório.',
            'text_usuario.email' => 'Usuário tem que ser um e-mail válido.',
            'text_senha.required' => 'Senha é obrigatório.',
            'text_senha.min' => 'A senha deve ter no mínimo :min caracteres',
            'text_senha.max' => 'A senha deve ter no máximo :max caracteres',
        ];
    }
}
