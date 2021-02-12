<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['login']);
    }

    public function me()
    {
        $response = lpApiResponse(
            false,
            'Informações do usuário logado retornado com sucesso!',
            [
                "user" => Auth::user()->getAttributes()
            ]
        );

        return response()->json($response, Response::HTTP_OK);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $arrAttempt  = [
            'email'    => $credentials['email'] ?? '',
            'password' => $credentials['password'] ?? '',
            'active'   => true,
        ];

        if (!$token = Auth::attempt($arrAttempt)) {
            $response = lpApiResponse(true, 'Credenciais inválidas');
            return response()->json($response, Response::HTTP_UNAUTHORIZED);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        Auth::logout();
        $response = lpApiResponse(false, 'Logout efetuado com sucesso!');
        return response()->json($response, Response::HTTP_OK);
    }

    private function respondWithToken($token)
    {
        $response = lpApiResponse(
            false,
            'Login efetuado com sucesso!',
            [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => Auth::factory()->getTTL() * 60
            ]
        );

        return response()->json($response, Response::HTTP_OK);
    }
}
