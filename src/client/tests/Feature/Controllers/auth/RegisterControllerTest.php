<?php

namespace Tests\Feature\Controllers\auth;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use WithFaker;

    /**
     * @return void
     * @test
     */
    public function testRegister()
    {
        $response = $this->post(route('register'), [
            'name' => 'Milad', 'email' => 'user1@test.io', 'password' => 'M!L@D1o1o##)', 'password_confirmation' => 'M!L@D1o1o##)'
        ], ['Accept' => 'application/json']);

        dd($response->getContent());
        $this->assertTrue(true);
    }
}
