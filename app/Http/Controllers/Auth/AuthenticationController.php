<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\AuthenticationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Responses\MessageResponse;
use App\Services\Auth\AccessTokenService;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationController extends Controller
{
    public function __construct(
        private readonly Factory            $auth,
        private readonly AccessTokenService $tokenService,
    )
    {
    }

    /**
     * @param LoginRequest $request
     * @return Responsable
     * @throws AuthenticationException
     */
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

    public function register()
    {

    }
}
