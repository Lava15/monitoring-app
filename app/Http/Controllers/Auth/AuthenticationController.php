<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\AuthenticationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationController extends Controller
{
    public function __construct(
        private readonly Factory $auth,
    )
    {
    }

    /**
     * @throws AuthenticationException
     */
    public function login(LoginRequest $request)
    {
        if (!$this->auth->guard()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException(
                message: 'Invalid credentials',
                code: Response::HTTP_UNAUTHORIZED
            );
        }


    }

    public function register()
    {

    }
}
