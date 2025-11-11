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

    public function verParticipantes()
    {

        $participantes = $this->userService->getParticipantes();

        return view('modulos.participantes', [
            'participantes' => $participantes
        ]);

    }

    // API responses

    public function getParticipantes()
    {

        $participantes = $this->userService->getParticipantes();

        $participantes = UserResource::collection($participantes);

        return $this->successResponse($participantes);

    }

    public function getRanking(Request $request)
    {
        $id_pais = $request->input('pais') ?? 1;

        $paises = $this->userService->getPaises();

        $pais = $paises->firstWhere('id', $id_pais);

        if (empty($pais)) {

            return $this->errorResponse('No se encontró el país', 422);

        }

        $participantes = $this->userService->getRanking($id_pais);

        $participantes = UserRankingResource::collection($participantes);

        return $this->successResponse($participantes);

    }
}
