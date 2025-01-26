<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = \auth()->user();
            $user->tokens()->delete();

            return response()->json([
                'id' => $user->id,
                'nome' => $user->name,
                'token' => $user->createToken('auth')->plainTextToken
            ]);
        } else {
            return response()->json([
                'menssagem' => 'email ou senha incorretos'
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
