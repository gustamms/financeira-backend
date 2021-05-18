<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Login with CPF/CNPJ and password to get the authentication token",
 *     name="Token based Based",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="apiAuth",
 * )
 */

class Controller extends BaseController
{
    /**
     * @OA\Info(
     *   title="Financial API",
     *   version="1.0",
     *   description="Wellcome! <br>To make requests, use login system passing cfpCnpj and password to get the token and click in Authorize and set the token",
     *   @OA\Contact(
     *     email="gustamms@hotmail.com",
     *     name="Financial Team"
     *   )
     * )
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ], 200);
    }
}
