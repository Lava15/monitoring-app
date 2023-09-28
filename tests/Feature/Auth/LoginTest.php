<?php


use App\Http\Controllers\Auth\AuthenticationController;
use Symfony\Component\HttpFoundation\Response;

it('checks validatation of users input', function (): void {
    $this->postJson(
        uri: action([AuthenticationController::class, 'login']),
        data: [],
    )->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonValidationErrorFor(key: 'email')
        ->assertJsonValidationErrorFor(key: 'password');
});
todo('checking status code for incorrect credentials');
todo('store access token in cache');
