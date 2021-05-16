<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
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

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }


}