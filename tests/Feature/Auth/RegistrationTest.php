<?php

namespace Tests\Feature\Auth;


use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

it('checks validation of users input', function (): void {
    $this->postJson(
        uri: action([RegisterController::class, 'register']),
        data: [],
    )->assertStatus(
        status: Response::HTTP_UNPROCESSABLE_ENTITY
    )->assertJsonValidationErrorFor(
        key: 'name',
    )->assertJsonValidationErrorFor(
        key: 'email',
    )->assertJsonValidationErrorFor(
        key: 'password',
    );
});

it('creates a new user', function (): void {
    expect(
        value: User::query()->count()
    )->toEqual(0);

    $this->postJson(
        uri: action([RegisterController::class, 'register']),
        data: [
            'name' => 'Test user',
            'email' => 'test@example.com',
            'password' => 'password'
        ],
    )->assertStatus(
        status: Response::HTTP_CREATED
    );

    expect(
        value: User::query()->count()
    )->toEqual(1);

});


it('stores access token in cache', function (): void {

    $response = $this->postJson(
        uri: action([RegisterController::class, 'register']),
        data: [
            'name' => 'Test user',
            'email' => 'test@example.com',
            'password' => 'password'
        ]
    );
    expect(
        value: Cache::get($response->json())
    )->not->toBeNull();
});


