<?php

namespace Tests\Feature\Controllers\api;


use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use WithFaker;

    /**
     * @return void
     * @test
     */
    public function loginRegisteredUser()
    {
        $payload = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'P@$$W0rd123',
            'password_confirmation' => 'P@$$W0rd123'
        ];

        $this->post(route('auth.register'), $payload, ['Accept' => 'application/json']);

        $response = $this->post(route('auth.login'), [
            'email' => $payload['email'],
            'password' => $payload['password'],
        ], [
            'Accept' => 'application/json'
        ]);

        $payload = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(60, $payload->data->ttl);
        $this->assertEquals('bearer', $payload->data->token_type);
        $this->assertIsString($payload->data->access_token);
    }
}
