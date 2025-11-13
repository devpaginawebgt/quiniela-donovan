<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ApiLoginRequest;
use App\Http\Resources\User\UserAuthResource;
use App\Http\Services\UserService;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    use ApiResponse;

    public function __construct(
        private readonly UserService $userService
    ) {}

    public function login(ApiLoginRequest $request) 
    {
        $request->ensureIsNotRateLimited();

        $user = $this->userService->getUserLogin($request);

        if ($user->status_user == 0) {

            return $this->errorResponse('No es posible ingresar con este usuario, para más información contacte a Soporte.', 401);

        }

        if ( !Hash::check($request->password, $user->password) ) { 

            RateLimiter::hit($request->throttleKey());

            return $this->errorResponse('Credenciales incorrectas, revisa tu correo electrónico o contraseña.', 401);

        }

        $token = $user->createToken('mobile-app');

        $user->token = $token->plainTextToken;
        
        $user = new UserAuthResource($user);

        return $this->successResponse($user);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->successResponse(['mensaje' => 'Sesión cerrada correctamente.']);
    }

    public function logoutAll(Request $request)
    {
        $request->user()->tokens()->delete();

        return $this->successResponse(['mensaje' => 'Se ha cerrado sesión en todos los dispositivos.']);
    }
}
