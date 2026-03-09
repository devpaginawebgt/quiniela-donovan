<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ApiLoginRequest;
use App\Http\Resources\User\UserRankResource;
use App\Http\Services\UserService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        if (empty($user)) {
            $request->hitRateLimiter();

            return $this->errorResponse('El número de documento ingresado no está registrado en el sistema.', 422);
        }

        if ( !Hash::check(env('DEFAULT_PASS'), $user->password) ) {
            $request->hitRateLimiter();

            return $this->errorResponse('Ha ocurrido un error al iniciar la sesión, contacta a Soporte.', 401);
        }

        if ($user->status_user == 0) {

            return $this->errorResponse('No es posible ingresar con este usuario, para más información contacte a Soporte.', 401);

        }

        $token = $user->createToken('mobile-app')->plainTextToken;
        
        $user = $this->userService->getUserRank($user);

        $user = $this->userService->getUserPredictionsCount($user);

        $user = new UserRankResource($user);

        return $this->successResponse([
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->successResponse(['message' => 'Sesión cerrada correctamente.']);
    }

    public function logoutAll(Request $request)
    {
        $request->user()->tokens()->delete();

        return $this->successResponse(['message' => 'Se ha cerrado sesión en todos los dispositivos.']);
    }
}
