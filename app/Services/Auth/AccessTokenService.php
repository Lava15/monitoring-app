<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class AccessTokenService
{
    /**
     * @param Model|User $user
     * @return string
     */
    public function create(Model|User $user): string
    {
        $token = Str::random(55);
        Cache::put(
            key: $token,
            value: [
                'id' => $user->getKey(),
                'role' => $user->getAttribute('role'),
            ],
            ttl: now()->addDay(),
        );
        return $token;
    }
}
