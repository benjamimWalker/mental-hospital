<?php

namespace App\Http\Controllers;


use App\Http\Requests\ListarMedicoRequest;
use App\Models\Cidade;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json(Cidade::when(
            $request->nome,
            fn(Builder $query) => $query->where('nome', 'like', "%$request->nome%")
        )->orderBy('nome')->select(['id', 'nome', 'estado'])->get());
    }

    public function medicos(Cidade $cidade, ListarMedicoRequest $request): JsonResponse
    {
        return response()->json($cidade->medicos()->when(
            $request->has('nome'),
            fn(Builder $builder) => $builder->where('nome', 'like', "%$request->nome%")
        )->orderBy('nome')->select(['id', 'nome', 'especialidade', 'cidade_id'])->get());
    }
}
