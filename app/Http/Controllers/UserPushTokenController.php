<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPushToken\UserPushTokenRequest;
use App\Http\Resources\UserPushToken\UserPushTokenResource;
use App\Http\Services\UserService;
use App\Models\UserPushToken;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserPushTokenController extends Controller
{
    use ApiResponse;

    public function __construct(
        private readonly UserService $userService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserPushTokenRequest $request, string $userId)
    {
        $userId = (int)$userId;

        if (empty($userId)) {

            return $this->errorResponse('No se encontró el usuario', 422);

        }

        $user = $this->userService->getUser($userId);

        if ( empty($user) ) {

            return $this->errorResponse('No se encontró el usuario', 422);

        }

        $data = $request->validated();

        $data['user_id'] = $userId;

        $token = UserPushToken::create($data);

        $token = new UserPushTokenResource($token);

        return $this->successResponse($token);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPushToken $userPushToken)
    {
        //
    }
}
