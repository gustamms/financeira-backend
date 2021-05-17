<?php 

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class TypePersonController extends BaseController {

	use TraitController;

	const MODEL = 'App\Models\TypePerson';

	protected $validationRules = [ 'typ_description' => 'required'];
}