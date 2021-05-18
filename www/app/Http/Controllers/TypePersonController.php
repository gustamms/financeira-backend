<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class TypePersonController extends BaseController
{

	use TraitController;

	const MODEL = 'App\Models\TypePerson';

	protected $validationRules = ['typ_description' => 'required', 'typ_sisid' => 'required'];

	/**
	 * @OA\Get(
	 *     path="/api/type-person",
	 *     summary="List of type person",
	 *     tags={"Type person"},
	 *     security={{ "apiAuth": {} }},
	 *     @OA\Response(
	 *         response="200",
	 *         description="Returns data",
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
	 *                                 property="typ_id",
	 *                                 type="integer",
	 *                                 example=1
	 *                              ),
	 * 								@OA\Property(
	 *                                 property="typ_description",
	 *                                 type="string",
	 *                                 example="Física"
	 *                              ),  
	 * 							 	@OA\Property(
	 *                                 property="typ_sisid",
	 *                                 type="string",
	 *                                 example="FIS"
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

	/**
	 * @OA\Get(
	 *     path="/api/type-person/{id}",
	 *     summary="Specific of type transactions",
	 *     tags={"Type person"},
	 *     security={{ "apiAuth": {} }},
	 *     @OA\Parameter(
	 *          name="id",
	 *          description="Type transactions id",
	 *          required=true,
	 *          in="path",
	 *          @OA\Schema(
	 *              type="integer"
	 *          )
	 *      ),
	 * 	    @OA\Response(
	 *         response="200",
	 *         description="Returns data",
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
	 *                                 property="typ_id",
	 *                                 type="integer",
	 *                                 example=1
	 *                              ),
	 * 								@OA\Property(
	 *                                 property="typ_description",
	 *                                 type="string",
	 *                                 example="Física"
	 *                              ),  
	 * 							 	@OA\Property(
	 *                                 property="typ_sisid",
	 *                                 type="string",
	 *                                 example="FIS"
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

	/**
	 * @OA\Post(
	 *     path="/api/type-person",
	 *     summary="Create new type transactions",
	 *     tags={"Type person"},
	 *     security={{ "apiAuth": {} }},
	 * 	   @OA\RequestBody(
	 *       required=true,
	 *       @OA\MediaType(
	 *           mediaType="application/json",
	 *           @OA\Schema(
	 *               type="object",
	 * 					@OA\Property(
	 *                  	property="typ_description",
	 *                      type="string",
	 *                      example="Lojista"
	 *                  ),  
	 * 					@OA\Property(
	 *                  	property="typ_sisid",
	 *                      type="string",
	 *                      example="LOG"
	 *                  ),
	 *           ),
	 *       ),
	 *     ),
	 * 	   @OA\Response(
	 *         response="200",
	 *         description="Returns data",
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
	 *                                 property="typ_id",
	 *                                 type="integer",
	 *                                 example=1
	 *                              ),
	 * 								@OA\Property(
	 *                                 property="typ_description",
	 *                                 type="string",
	 *                                 example="Física"
	 *                              ),  
	 * 							 	@OA\Property(
	 *                                 property="typ_sisid",
	 *                                 type="string",
	 *                                 example="FIS"
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
}
