<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\AuthenticationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Responses\MessageResponse;
use App\Services\Auth\AccessTokenService;
use App\Services\Auth\AuthenticationService;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Register
 *
 * @group Authentication
 *
 * APIs fo register and login
 */
class RegisterController extends Controller
{
    public function __construct(
        private readonly AccessTokenService    $tokenService,
        private readonly AuthenticationService $authService,
    )
    {
    }

    /**
     * Register
     *
     * Create a new user
     *
     * @param RegisterRequest $request The incoming register request.
     * @return Responsable The response with the created user
     * @throws AuthenticationException If failed to create a user.
     */
    public function register(RegisterRequest $request): Responsable
    {
        try {
            $user = $this->authService->createUser(
                data: [
                    'name' => $request->string('name')->toString(),
                    'email' => $request->string('email')->toString(),
                    'password' => Hash::make(
                        value: $request->string('password')->toString(),
                    )
                ]
            );
        } catch (Throwable $exception) {
            throw new AuthenticationException(
                message: 'Failed to create a user',
                code: Response::HTTP_INTERNAL_SERVER_ERROR,
                previous: $exception
            );
        };

        return new MessageResponse(
            data: [
                'message' => $this->tokenService->create(
                    user: $user,
                )
            ],
            status: Response::HTTP_CREATED
        );
    }
}
