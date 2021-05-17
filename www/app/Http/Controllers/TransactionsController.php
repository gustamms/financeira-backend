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

    public function store(Request $request)
    {
        return $this->transactionsService->store($request);
    }
}
