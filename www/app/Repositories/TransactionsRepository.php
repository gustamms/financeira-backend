<?php

namespace App\Repositories;

use App\Models\Transactions;

class TransactionsRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected $class = Transactions::class;

    public $module = 'Transactions';
}
