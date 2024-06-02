<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rulesForCreate(): array
    {
        return [
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
            'senha' => 'required',
            'confirmacaoSenha' => 'required|same:senha',
        ];
    }
    public function rulesForUpdate(): array
    {
        return [
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',

        ];

    }
    public function messages(): array
    
    {
        return [
            'nome.required' => 'Campo nome é obrigatorio',
            'telefone.required' => 'Campo telefone é obrigatorio',

            'email.required' => 'Campo email é obrigatorio',
            'senha.required' => 'Campo senha é obrigatorio',
            'confirmacaoSenha.required' => 'Campo confirme a sua senha  é obrigatorio',
        ];
    }
}
