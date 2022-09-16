<?php

namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepository;

interface UserRepository extends BaseRepository
{
    public function registerNewUser(array $request);

    public function jwtAuthentication(array $request);
}
