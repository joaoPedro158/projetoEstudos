<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cep'         => ['required', 'string', 'max:9', 'regex:/^\d{5}-?\d{3}$/'],
            'logradouro'  => 'required|string|max:255',
            'numero'      => 'required|string|max:10',
            'bairro'      => 'required|string|max:100',
            'cidade'      => 'required|string|max:100',
            'estado'      => 'required|string|size:2',
            'tipo'        => 'required|in:casa,trabalho,parente,outro',
            'principal'   => 'nullable|boolean',
            'complemento' => 'nullable|string|max:255',
        ];
    }


}
