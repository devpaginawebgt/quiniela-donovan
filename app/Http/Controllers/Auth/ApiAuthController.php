<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ApiLoginRequest;
use App\Http\Resources\User\UserRankingResource;
use App\Http\Resources\User\UserResource;
use App\Http\Services\UserService;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ApiAuthController extends Controller
{
    use ApiResponse;

    public function __construct(
        private readonly UserService $userService
    ) {}

    public function login(ApiLoginRequest $request) 
    {
        $this->ensureIsNotRateLimited($request);

        $user = $this->userService->getUserLogin($request);

        if (empty($user)) {
            RateLimiter::hit($this->throttleKey($request));

            return $this->errorResponse('El número de documento ingresado no está registrado en el sistema.', 422);
        }

        if ($user->status_user == 0) {

            return $this->errorResponse('No es posible ingresar con este usuario, para más información contacte a Soporte.', 401);

        }

        $token = $user->createToken('mobile-app')->plainTextToken;
        
        $user = $this->userService->getUserRank($user);

        $user = $this->userService->getUserPredictionsCount($user);

        $user = new UserRankingResource($user);

        return $this->successResponse([
            'token' => $token,
            'user' => $user,
        ]);
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(ApiLoginRequest $request)
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey($request), 10)) {
            
            $seconds = RateLimiter::availableIn($this->throttleKey($request));
    
            $minutes = ceil($seconds / 60);
    
            throw ValidationException::withMessages([
                'numero_documento' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => $minutes,
                ]),
            ]);

        }        
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey(ApiLoginRequest $request)
    {
        return Str::lower($request->input('numero_documento')).'|'.$request->ip();
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
