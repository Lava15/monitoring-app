<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Traits\HasDatabase;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

readonly class AuthenticationService
{
    use HasDatabase;

    /**
     * @param array $data
     * @throws \Throwable
     */

    public function createUser(array $data): Model|User
    {
        return $this->database->transaction(
            callback: fn() => User::query()->create($data),
            attempts: 2
        );
    }
}
