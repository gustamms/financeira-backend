<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\TypePerson;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showEspecificUser($id = null)
    {
        try {

            $typePerson = TypePerson::find(Auth::getUser()->typ_id);

            // $transactions = Transactions::where();

            if ($typePerson->typ_sisid == 'LOG') {
            }

            // $data = Transactions::where('')
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function show($id)
    {
    }

    public function store(Request $request)
    {
        try {

            $typePerson = TypePerson::find(Auth::getUser()->typ_id);

            if ($typePerson->typ_sisid == 'LOG') {
                throw new Exception("Logistas não podem efetuar transferências", 1);
            }

            if ($request->input('use_id_payee') == Auth::getUser()->use_id) {
                throw new Exception("Não é possível efetuar transferências para o próprio beneficiário", 1);
            }

            $transactions = new Transactions();

            $validator = \Validator::make($request->all(), $transactions::$rules);

            if ($validator->fails()) {
                throw new \Exception('Validation exception');
            }

            $data = Transactions::create([
                'typ_tran_id'   =>  $request->input('typ_tran_id'),
                'use_id_payer'  =>  Auth::getUser()->use_id,
                'use_id_payee'  =>  $request->input('use_id_payee'),
                'tra_value'     =>  $request->input('tra_value')
            ]);

            $response = [
                'code' => 200,
                'status' => 'success',
                'data' => $data,
                'message' => 'Not Found'
            ];
        } catch (\Throwable $th) {
            //throw $th;
            $response = [
                'code' => 404,
                'status' => 'error',
                'data' => 'Resource Not Found',
                'message' => $th->getMessage()
            ];
        } finally {

            return response()->json($response, $response['code']);
        }
    }
}
