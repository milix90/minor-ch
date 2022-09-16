<?php

namespace Tests\Feature\Controllers\auth;


use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use WithFaker;

    /**
     * @return void
     * @test
     */
    public function testLogin()
    {
        $response = $this->post(route('login'), [
            'email' => 'user1@test.io', 'password' => 'M!L@D1o1o##)',
        ], ['Accept' => 'application/json']);

        dd($response->getContent());
        $this->assertTrue(true);
    }
}
