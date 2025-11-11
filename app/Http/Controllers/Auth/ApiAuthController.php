<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ApiLoginRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Services\UserService;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

class ApiAuthController extends Controller
{
    use ApiResponse;

    public function __construct(
        private readonly UserService $userService
    ) {}

    public function login(ApiLoginRequest $request) 
    {
        $request->ensureIsNotRateLimited();

        $user = User::where('email', $request->email)->first();

        if ($user->status_user == 0) {

            return $this->errorResponse('No es posible ingresar con este usuario, para más información contacte a Soporte.', 401);

        }

        if ( !Hash::check($request->password, $user->password) ) { 

            RateLimiter::hit($request->throttleKey());

            return $this->errorResponse('Credenciales incorrectas, revisa tu correo electrónico o contraseña.', 401);

        }

        $user->pais = $this->userService->getNombrePais($user->pais_id);

        $user = new UserResource($user);

        return $this->successResponse($user);
    }
}
