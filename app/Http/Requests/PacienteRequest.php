<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PacienteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => ['nullable', 'string', 'max:255'],
            'celular' => ['nullable', 'string', 'max:20'],
            'cpf' => Rule::prohibitedIf($this->isMethod('put'))
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
