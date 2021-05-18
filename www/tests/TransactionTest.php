<?php

class TransactionTest extends TestCase
{
    /**
     * Transaction física user to física user.
     *
     * @return void
     */
    public function testFisica()
    {
        // create user data
        $user = \App\Models\User::factory()->create([
            'typ_id' => '1',
            'use_cpf_cnpj' => '1234',
            'use_mail' => 'g@gmail.com',
            'use_name'  =>  'Teste',
            'password' => app('hash')->make('secret123')
        ]);

        \App\Models\Transactions::create([
            'typ_tran_id' => '1',
            'use_id_payer' => '1',
            'use_id_payee' => $user->use_id,
            'tra_value'  =>  150,
        ]);

        // create valid token
        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);

        $this->json('POST', '/api/transactions', ['typ_tran_id' => 1, 'use_id_payee' => 1, 'tra_value' => 90],  ['Authorization' => "Bearer $token"])
            ->seeStatusCode(201);
    }

    /**
     * Transaction Lojistas user to física user.
     *
     * @return void
     */
    public function testLojista()
    {

        // create user data
        $user = \App\Models\User::factory()->create([
            'typ_id' => '2',
            'use_cpf_cnpj' => '12345',
            'use_mail' => 'lojista@gmail.com',
            'use_name'  =>  'Teste Lojista',
            'password' => app('hash')->make('secret123')
        ]);

        // create valid token
        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);

        $this->json('POST', '/api/transactions', ['typ_tran_id' => 1, 'use_id_payee' => 3, 'tra_value' => '100.00'],  ['Authorization' => "Bearer $token"])
            ->seeStatusCode(500);
    }
}
