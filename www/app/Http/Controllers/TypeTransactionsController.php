<?php 

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class TypeTransactionsController extends BaseController {

	use TraitController;

	const MODEL = 'App\Models\TypeTransactions';

	protected $validationRules = [ 'typ_tran_description' => 'required'];
}