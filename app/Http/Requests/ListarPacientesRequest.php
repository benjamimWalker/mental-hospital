<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListarPacientesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'apenas-agendadas' => ['nullable', 'boolean'],
            'nome' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
