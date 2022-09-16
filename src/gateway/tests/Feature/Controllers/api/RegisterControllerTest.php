<?php

namespace Tests\Feature\Controllers\api;


use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use WithFaker;

    /**
     * @return void
     * @test
     */
    public function registerNewUser()
    {
        $response = $this->post(route('auth.register'), [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'P@$$W0rd123',
            'password_confirmation' => 'P@$$W0rd123'
        ], [
            'Accept' => 'application/json'
        ]);

        $payload = json_decode($response->getContent());

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals("Registration done successfully!", $payload->data);
    }
}
