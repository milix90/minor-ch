<?php

namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepository;

interface SearchRepository extends BaseRepository
{
    public function searchItemsByKeyword($value);

}
