<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\ListarMedicoRequest;
use App\Http\Requests\ListarPacientesRequest;
use App\Http\Requests\MedicoRequest;
use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MedicoController extends Controller
{
    public function index(ListarMedicoRequest $request): JsonResponse
    {
        return response()->json(Medico::when(
            $request->has('nome'),
            fn(Builder $builder) => $builder->where('nome', 'like', "%$request->nome")
        )->orderBy('nome')->select(['id', 'nome', 'especialidade', 'cidade_id'])->get());
    }

    public function marcarConsulta(ConsultaRequest $request): JsonResponse
    {
        return response()->json(Consulta::create($request->validated()), Response::HTTP_CREATED);
    }

    public function pacientes(Medico $medico, ListarPacientesRequest $request): JsonResponse
    {
        return response()->json(
            $medico
                ->pacientes()
                ->withPivot(['id', 'data', 'created_at', 'updated_at', 'deleted_at'])
                ->when(
                    $request->has('nome'),
                    fn(Builder $builder) => $builder->where('nome', 'like', "%$request->nome%")
                )
                ->when(
                    $request->has('apenas-agendadas'),
                    fn(Builder $builder) => $builder->where('consulta.data', '>=', now())
                )
                ->orderBy('nome')
                ->groupBy('id')
                ->select('paciente.*')
                ->get()
                ->map(function (Paciente $paciente) {
                    $paciente->consulta = $paciente->pivot;
                    unset($paciente->pivot);
                    return $paciente;
                }));
    }

    public function create(MedicoRequest $request): JsonResponse
    {
        return response()->json(Medico::create($request->validated()), Response::HTTP_CREATED);
    }
}
