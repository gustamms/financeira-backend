<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;

use App\Models\Transactions;
use App\Models\TypePerson;
use App\Models\User;
use App\Repositories\TransactionsRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TransactionsService
{
    private $repo;

    public function __construct(TransactionsRepository $repo)
    {
        $this->repo = $repo;
    }
    public function getAll()
    {
        return $this->repo->index();
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->input(), Transactions::$rules);

        if ($validator->fails()) {
            throw new Exception('Falha na validação dos dados');
        }

        if ($request->input('tra_value') <= 0) {
            throw new Exception('Não é possível transferir valores abaixo ou igual à 0');
        }

        if ($request->input('use_id_payee') == Auth::getUser()->use_id) {
            throw new Exception('Não é possível efetuar transferências para o próprio beneficiário');
        }

        $typePerson = TypePerson::find(Auth::getUser()->typ_id);

        if ($typePerson->typ_sisid == 'LOJ') {
            throw new Exception("Lojistas não podem efetuar transferências", 1);
        }

        if (!User::find($request->input('use_id_payee'))) {
            throw new Exception("Beneficiário não existe", 1);
        }

        $responseExternal = Http::get('https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6');

        $responseExternal = $responseExternal->json();

        if ($responseExternal['message'] != "Autorizado") {
            throw new Exception("Erro externo", 1);
        }

        $request->request->add(["use_id_payer" => Auth::getUser()->use_id]);

        return $this->repo->create($request);
    }
}
