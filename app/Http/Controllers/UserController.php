<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserRankingResource;
use App\Http\Resources\User\UserResource;
use App\Http\Services\UserService;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponse;

    public function __construct(
        private readonly UserService $userService,
    ) {}

    // API responses

    public function getUsers()
    {

        $participantes = $this->userService->getUsers();

        $participantes = UserResource::collection($participantes);

        return $this->successResponse($participantes);

    }
    
    public function getUser(Request $request)
    {
        $user = $request->user();        

        $user = new UserRankingResource($user);

        return $this->successResponse($user);

    }

    public function getRanking(Request $request)
    {
        $user = $request->user();

        $id_pais = $user->pais_id;

        $pais = $this->userService->getPais($id_pais);

        if (empty($pais)) {

            return $this->errorResponse('No se encontró el país', 422);

        }

        $participantes = $this->userService->getRanking($id_pais);

        $participantes = UserRankingResource::collection($participantes);

        return $this->successResponse($participantes);

    }

    public function getUserRank(Request $request)
    {
        $user = $request->user();

        $user_rank = $this->userService->getUserRank($user);

        $user_rank = new UserRankingResource($user_rank);

        return $this->successResponse($user_rank);

    }

    // Funciones para la web

    public function verParticipantes()
    {

        $participantes = $this->userService->getUsers();

        return view('modulos.participantes', [
            'participantes' => $participantes
        ]);

    }
}
