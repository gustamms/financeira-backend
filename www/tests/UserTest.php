<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * Test login user.
     *
     * @return void
     */
    public function testLoginUser()
    {
        $this->json('POST', '/api/login', ['cpfCnpj' => '94728668320', 'password' => '123456'])
            ->seeStatusCode(200);
    }

    /**
     * Test wrong credentials login user.
     *
     * @return void
     */
    public function testLoginErrorUser()
    {
        $this->json('POST', '/api/login', ['cpfCnpj' => '94728668320', 'password' => '1234563'])
            ->seeStatusCode(401);
    }
}
