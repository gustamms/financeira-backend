<?php

use Illuminate\Support\Facades\Http;

class TransactionTest extends TestCase
{
    /**
     * Transaction física user to física user.
     *
     * @return void
     */
    public function testFisica()
    {

        $responseExternal = Http::post('localhost/api/login', ['cpfCnpj' => '96243480143', 'password' => '1234']);

        $responseExternal = $responseExternal->json();

        $this->json('POST', '/api/transactions', ['typ_tran_id' => 1, 'use_id_payee' => 3, 'tra_value' => '100.00'],  ['HTTP_Authorization' => $responseExternal['token']])
            ->seeStatusCode(201);
    }

    /**
     * Transaction Lojistas user to física user.
     *
     * @return void
     */
    public function testLojista()
    {

        $responseExternal = Http::post('localhost/api/login', ['cpfCnpj' => '06752811000125', 'password' => '12345']);

        $responseExternal = $responseExternal->json();

        $this->json('POST', '/api/transactions', ['typ_tran_id' => 1, 'use_id_payee' => 3, 'tra_value' => '100.00'],  ['HTTP_Authorization' => $responseExternal['token']])
            ->seeStatusCode(401);
    }
}
