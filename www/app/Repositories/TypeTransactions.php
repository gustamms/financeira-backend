<?php

namespace App\Repositories;

use App\Models\TypeTransactions;

class TypeTransactionsRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected $class = TypeTransactions::class;

    public $module = 'TypeTransactions';
}
