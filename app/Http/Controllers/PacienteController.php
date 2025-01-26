<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Models\Paciente;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PacienteController extends Controller
{
    public function update(PacienteRequest $request, Paciente $paciente): JsonResponse
    {
        $paciente->update($request->validated());
        return response()->json($paciente);
    }

    public function create(PacienteRequest $request): JsonResponse
    {
        return response()->json(Paciente::create($request->validated()), Response::HTTP_CREATED);
    }
}
