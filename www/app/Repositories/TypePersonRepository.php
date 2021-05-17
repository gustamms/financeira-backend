<?php

namespace App\Repositories;

use App\Models\TypePerson;

class TypePersonRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected $class = TypePerson::class;

    public $module = 'TypePerson';
}
