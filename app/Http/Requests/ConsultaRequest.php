<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'data' => ['required', 'date'],
            'medico_id' => ['required', 'exists:medico,id'],
            'paciente_id' => ['required', 'exists:paciente,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
