<?php

namespace App\Repositories;

use App\Models\Transactions;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionsRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected $class = Transactions::class;

    public $module = 'Transactions';

    /**
     * @param Request $request
     * @return array
     */
    public function create(Request $request)
    {
        try {
            $data = $this->model::create($request->input());

            $responseExternal = Http::get('http://o4d9z.mocklab.io/notify');

            $responseExternal = $responseExternal->json();

            if ($responseExternal['message'] != "Success") {
                throw new Exception("Erro externo", 1);
            }

            $response = [
                'code' => 201,
                'status' => 'success',
                'data' => $data
            ];
        } catch (\Throwable $th) {
            //throw $th;
            $response = [
                'code' => 400,
                'status' => 'error',
                'message' => $th->getMessage()
            ];
        } finally {
            return response()->json($response, $response['code']);
        }
    }
}
