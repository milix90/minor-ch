<?php

namespace Tests\Feature\Controllers\api;


use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchControllerTest extends TestCase
{
    use WithFaker;

    /**
     * @return void
     * @test
     */
    public function searchKeyword()
    {
        $payload = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'P@$$W0rd123',
            'password_confirmation' => 'P@$$W0rd123'
        ];

        $this->post(route('auth.register'), $payload, ['Accept' => 'application/json']);

        $user = $this->post(route('auth.login'), [
            'email' => $payload['email'],
            'password' => $payload['password'],
        ], [
            'Accept' => 'application/json'
        ]);

        $payload = json_decode($user->getContent());

        $response = $this->post(route('search.book', ['keyword' => 'سعدی']), [], [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $payload->data->access_token
        ]);

        $search = json_decode($response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertIsArray($search->data);
        $this->assertIsNumeric($search->data[0]->id);
        $this->assertIsString($search->data[0]->title);
        $this->assertIsString($search->data[0]->slug);
        $this->assertIsString($search->data[0]->content);
        $this->assertIsArray($search->data[0]->authors);
    }
}
