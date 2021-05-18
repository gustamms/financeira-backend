<?php

namespace App\Http\Controllers;

use App\Services\TransactionsService;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{

    private $transactionsService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TransactionsService $transactionsService)
    {
        $this->middleware('auth');
        $this->transactionsService = $transactionsService;
    }

    public function index()
    {
        return $this->transactionsService->getAll();
    }

    public function show($id)
    {
        return $this->transactionsService->get($id);
    }

    /**
     * @OA\Post(
     *     path="/api/transactions",
     *     summary="Transactions system",
     *     tags={"Transactions"},
     *     security={{ "apiAuth": {} }},
     *     @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                  property="typ_tran_id",
     *                  type="integer",
     *                  description="Type transaction id"
     *              ),
     *              @OA\Property(
     *                  property="use_id_payee",
     *                  type="integer",
     *                  description="User id payee"
     *              ),
     *              @OA\Property(
     *                  property="tra_value",
     *                  type="string",
     *                  description="Transactions value"
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
     *                         property="code",
     *                         type="integer",
     * 						   example=200
     *                     ),
     *                     @OA\Property(
     *                         property="status",
     *                         type="string",
     *                         example="success"
     *                     ),
     *                     @OA\Property(
     *                         property="data",
     *                         type="array",
     *                         @OA\Items(
     * 						 		@OA\Property(
     *                                 property="typ_tran_id",
     *                                 type="integer",
     *                                 example=1
     *                              ),
     * 								@OA\Property(
     *                                 property="use_id_payee",
     *                                 type="integer",
     *                                 example=1
     *                              ),  
     * 							 	@OA\Property(
     *                                 property="tra_value",
     *                                 type="string",
     *                                 example="100.00"
     *                              ),
     *                              @OA\Property(
     *                                 property="use_id_payer",
     *                                 type="integer",
     *                                 example=2
     *                              ),
     * 								@OA\Property(
     *                                 property="created_at",
     *                                 type="string",
     *                                 example="2021-05-17T22:39:57.000000Z"
     *                              ),  
     * 							 	@OA\Property(
     *                                 property="updated_at",
     *                                 type="string",
     *                                 example="2021-05-17T22:39:57.000000Z"
     *                              ),
     * 						   ),
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
    public function store(Request $request)
    {
        return $this->transactionsService->store($request);
    }
}
