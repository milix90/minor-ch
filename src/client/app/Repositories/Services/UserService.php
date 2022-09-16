<?php

namespace App\Repositories\Services;

use App\Models\User;
use App\Repositories\BaseService;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserService extends BaseService implements UserRepository
{
    /**
     * @var User
     */
    public $model;

    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model->query();
    }

    /**
     * @param array $request
     * @return void
     * @throws \Exception
     */
    public function registerNewUser(array $request)
    {
        try {
            $this->model->create($request);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }


    /**
     * @param array $request
     * @return string
     */
    public function jwtAuthentication(array $request): string
    {
        $user = $this->getUserByUsername($request['email']);
        $credentials = ['email' => $user->email, 'password' => $request['password']];
        $token = auth()->setTTL(config('jwt.ttl'))->attempt($credentials);

        if (!$token) {
            return response()->json(['err' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        return $token;
    }


    public function getUserByUsername($email)
    {
        return $this->model->where('email', '=', $email)
            ->firstOrFail();
    }
}
