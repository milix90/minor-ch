<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegister;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    /**
     * @var UserRepository
     */
    public UserRepository $user;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository;
    }

    /**
     * @param UserRegister $register
     * @return JsonResponse
     */
    public function register(UserRegister $register): JsonResponse
    {
        $this->user->registerNewUser($register->only(['name', 'email', 'password']));
        return response()->json(__('custom.msg.register'), Response::HTTP_CREATED);
    }
}
