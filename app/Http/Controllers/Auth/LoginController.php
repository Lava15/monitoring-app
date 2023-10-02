<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\AuthenticationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Responses\MessageResponse;
use App\Services\Auth\AccessTokenService;
use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Auth\Factory;

class LoginController extends Controller
{

    public function __construct(
        private readonly Factory            $auth,
        private readonly AccessTokenService $tokenService,
    )
    {
    }
    public function login(LoginRequest $request): Responsable
    {
        if (!$this->auth->guard()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException(
                message: 'Invalid credentials',
                code: Response::HTTP_UNAUTHORIZED
            );
        }
        $token = $this->tokenService->create(
            user: $this->auth->guard()->user(),
        );
        return new MessageResponse(
            data: $token,
            status: Response::HTTP_CREATED,
        );
    }
}
