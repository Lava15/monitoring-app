<?php


use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

it('checks validatation of users input', function (): void {
    $this->postJson(
        uri: action([LoginController::class, 'login']),
        data: [],
    )->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonValidationErrorFor(key: 'email')
        ->assertJsonValidationErrorFor(key: 'password');
});

it('checks status code for correct credentials', function (): void {
    $user = User::factory()->create();
    $this->postJson(
        uri: action([LoginController::class, 'login']),
        data: [
            'email' => $user->getAttribute('email'),
            'password' => 'password'
        ]
    )->assertStatus(
        status: Response::HTTP_CREATED
    );
});

it('stores access token in cache', function (): void {
    $user = User::factory()->create();

    $response = $this->postJson(
        uri: action([LoginController::class, 'login']),
        data: [
            'email' => $user->getAttribute('email'),
            'password' => 'password'
        ]
    );
    expect(
        value: Cache::get($response->json())
    )->not->toBeNull();
});
