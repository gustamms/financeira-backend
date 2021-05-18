<?php

class TypeTransactionsTest extends TestCase
{
    /**
     * Get all type transations.
     *
     * @return void
     */
    public function testGetAll()
    {
        $user = \App\Models\User::factory()->create([
            'typ_id' => '1',
            'use_cpf_cnpj' => '123456789',
            'use_mail' => 'getAllTypeTransactions@gmail.com',
            'use_name'  =>  'Teste type transactions',
            'password' => app('hash')->make('secret123')
        ]);

        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);

        $this->json('GET', '/api/type-transactions', [],  ['Authorization' => "Bearer $token"])
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
            'use_cpf_cnpj' => '12345678910',
            'use_mail' => 'getIdTypeTransactions@gmail.com',
            'use_name'  =>  'Teste especific id type transactions',
            'password' => app('hash')->make('secret123')
        ]);

        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);

        $this->json('GET', '/api/type-transactions/1', [],  ['Authorization' => "Bearer $token"])
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
            'use_cpf_cnpj' => '12345678911',
            'use_mail' => 'storeTypeTransactions@gmail.com',
            'use_name'  =>  'Teste store type transactions',
            'password' => app('hash')->make('secret123')
        ]);

        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);

        $this->json('POST', '/api/type-transactions', ['typ_tran_description' => 'TESTE', 'typ_tran_sisid' => 'TES'],  ['Authorization' => "Bearer $token"])
            ->seeStatusCode(201);
    }
}
