<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    /**
     * @OA\Post(
     *     path="/api/register",
     *     summary="Register new user",
     *     tags={"User"},
     *     @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                  property="type",
     *                  type="integer",
     *                  description="Type of user"
     *              ),
     *              @OA\Property(
     *                  property="cpfCnpj",
     *                  type="string",
     *                  description="Cpf or Cnpj"
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  type="string",
     *                  description="Email user"
     *              ),
     *              @OA\Property(
     *                  property="name",
     *                  type="string",
     *                  description="Name user"
     *              ),
     *              @OA\Property(
     *                  property="password",
     *                  type="string",
     *                  description="password user"
     *              ),
     *              @OA\Property(
     *                  property="password_confirmation",
     *                  type="string",
     *                  description="Password confirmation user"
     *              ),
     *           ),
     *       ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Returns success",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="token",
     *                         type="string",
     *                         description="Token for authentication Bearer",
     *                         example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.iLCJpYXQiOjE2MTk3ODIyNjksImV4cCI6MTYyMDM4NzA2OSwibmJmIjoxNjE5NzgyMjY5LCJqdGkiOiJXMWNyYjY5ZTI1MjJkYTE5NTc1OWJiZTEyMmJjZDFlNTIyZDEifQ.V5ajtaBf1M3Bb8HIb-.94Wan9GbvwVawF2Xwd2cvwFM5ATO6Q3cvhGbhN2bs9CXvwlOwRHdoJiOiM3cpJyezdTJHUmdrcnp5TVlnMW41Iiwic3ViIjo1MDEsInBydiI6IjE0MzA2ZGQ4G7zRJxj_AC0nHsAVB8io"
     *                     ),
     *                     @OA\Property(
     *                         property="token_type",
     *                         type="string",
     *                         description="Token type",
     *                         example="bearer"
     *                     ),
     *                     @OA\Property(
     *                         property="expires_in",
     *                         type="integer",
     *                         description="When token expires",
     *                         example=3600
     *                     ),
     *                 )
     *             )
     *         }
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Error",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="message",
     *                         type="string",
     *                         description="Error message"
     *                     ),
     *                     example={
     *                         "message": "Unauthorized"
     *                     }
     *                 )
     *             )
     *         }
     *     ),
     * )
     */
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'type'      => 'required',
            'cpfCnpj'   => 'required',
            'email'     => 'required',
            'name'      => 'required|string',
            'password'  => 'required|confirmed',
        ]);

        try {

            $user = new User;
            $user->typ_id = $request->input('type');
            $user->use_cpf_cnpj = $request->input('cpfCnpj');
            $user->use_mail = $request->input('email');
            $user->use_name = $request->input('name');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);

            $user->save();

            //return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'use_cpf_cnpj';
    }

    /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="Login system",
     *     tags={"Login"},
     *     @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                  property="cpfCnpj",
     *                  type="string",
     *                  description="CPF or CNPJ"
     *              ),
     *              @OA\Property(
     *                  property="password",
     *                  type="string",
     *                  description="Password user"
     *              ),
     *           ),
     *       ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Returns Token",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="user",
     *                         type="string",
     *                         description="User details",
     *                         example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.iLCJpYXQiOjE2MTk3ODIyNjksImV4cCI6MTYyMDM4NzA2OSwibmJmIjoxNjE5NzgyMjY5LCJqdGkiOiJXMWNyYjY5ZTI1MjJkYTE5NTc1OWJiZTEyMmJjZDFlNTIyZDEifQ.V5ajtaBf1M3Bb8HIb-.94Wan9GbvwVawF2Xwd2cvwFM5ATO6Q3cvhGbhN2bs9CXvwlOwRHdoJiOiM3cpJyezdTJHUmdrcnp5TVlnMW41Iiwic3ViIjo1MDEsInBydiI6IjE0MzA2ZGQ4G7zRJxj_AC0nHsAVB8io"
     *                     ),
     *                     @OA\Property(
     *                         property="token_type",
     *                         type="string",
     *                         description="Token type",
     *                         example="bearer"
     *                     ),
     *                     @OA\Property(
     *                         property="expires_in",
     *                         type="integer",
     *                         description="When token expires",
     *                         example=3600
     *                     ),
     *                 )
     *             )
     *         }
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Error",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="message",
     *                         type="string",
     *                         description="Error message"
     *                     ),
     *                     example={
     *                         "message": "Unauthorized"
     *                     }
     *                 )
     *             )
     *         }
     *     ),
     * )
     */

    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'cpfCnpj'   => 'required|string',
            'password'  => 'required|string',
        ]);

        $credentials = ['use_cpf_cnpj' => $request->input('cpfCnpj'), 'password' => $request->input('password')];

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
}
