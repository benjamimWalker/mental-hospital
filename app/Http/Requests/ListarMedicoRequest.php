<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListarMedicoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => ['nullable' ,'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'nome' => in_array($this->nome, ['dr', 'dra']) ? '' : $this->nome,
        ]);
    }
}
