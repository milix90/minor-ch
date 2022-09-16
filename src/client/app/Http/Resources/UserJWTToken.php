<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserJWTToken extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            "access_token" => $this->resource,
            "token_type" => "bearer",
            "ttl" => config('jwt.ttl')
        ];
    }
}
