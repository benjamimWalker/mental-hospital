<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;

Route::group(['name' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::group(['prefix' => 'cidades'], function () {
    Route::get('', [CidadeController::class, 'index']);
    Route::get('{cidade}/medicos', [CidadeController::class, 'medicos']);
});

Route::group(['prefix' => 'medicos'], function () {
    Route::get('', [MedicoController::class, 'index']);
    Route::post('consulta', [MedicoController::class, 'marcarConsulta'])->middleware('auth:sanctum');
    Route::get('{medico}/pacientes', [MedicoController::class, 'pacientes'])->middleware('auth:sanctum');
    Route::post('', [MedicoController::class, 'create'])->middleware('auth:sanctum');
});

Route::group(['prefix' => 'pacientes', 'middleware' => 'auth:sanctum'], function () {
    Route::put('{paciente}', [PacienteController::class, 'update']);
    Route::post('', [PacienteController::class, 'create']);
});
