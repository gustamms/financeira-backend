<?php

class TypePersonTest extends TestCase
{
    /**
     * Get all type person.
     *
     * @return void
     */
    public function testGetAll()
    {
        // create user data
        $user = \App\Models\User::factory()->create([
            'typ_id' => '1',
            'use_cpf_cnpj' => '123456',
            'use_mail' => 'getAllTypePerson@gmail.com',
            'use_name'  =>  'Teste type person',
            'password' => app('hash')->make('secret123')
        ]);
        // create valid token
        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);

        $this->json('GET', '/api/type-person', [],  ['Authorization' => "Bearer $token"])
            ->seeStatusCode(200);
    }

    /**
     * Recovery a specific type person.
     *
     * @return void
     */
    public function testGetId()
    {

        $user = \App\Models\User::factory()->create([
            'typ_id' => '1',
            'use_cpf_cnpj' => '1234567',
            'use_mail' => 'getIdTypePerson@gmail.com',
            'use_name'  =>  'Teste id type person',
            'password' => app('hash')->make('secret123')
        ]);

        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);

        $this->json('GET', '/api/type-person/1', [],  ['Authorization' => "Bearer $token"])
            ->seeStatusCode(200);
    }

    /**
     * Store a new type person.
     *
     * @return void
     */
    public function testStore()
    {

        $user = \App\Models\User::factory()->create([
            'typ_id' => '1',
            'use_cpf_cnpj' => '12345678',
            'use_mail' => 'storeTypePerson@gmail.com',
            'use_name'  =>  'Teste store type person',
            'password' => app('hash')->make('secret123')
        ]);

        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);

        $this->json('POST', '/api/type-person', ['typ_description' => 'TESTE', 'typ_sisid' => 'TES'],  ['Authorization' => "Bearer $token"])
            ->seeStatusCode(201);
    }
}
