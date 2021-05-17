<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'tra_id';

    protected $fillable = [
        'typ_tran_id',
        'use_id_payer',
        'use_id_payee',
        'tra_value'
    ];

    public static $rules = [
        'typ_tran_id'   =>  'required',
        'use_id_payee'  =>  'required',
        'tra_value'     =>  'required'
    ];
}
