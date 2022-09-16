<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateUserLogin;
use App\Http\Resources\UserJWTToken;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    /**
     * @var UserRepository
     */
    private UserRepository $user;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository;
    }

    /**
     * @param ValidateUserLogin $login
     * @return JsonResponse
     */
    public function login(ValidateUserLogin $login): JsonResponse
    {
        $token = $this->user->jwtAuthentication($login->only(['email', 'password']));
        return response()->json(new UserJWTToken($token), Response::HTTP_OK);
    }
}
