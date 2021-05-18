<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTransactions extends Model
{
    protected $table = 'type_transactions';
    protected $primaryKey = 'typ_tran_id';

    protected $fillable = [
        'typ_tran_description',
        "typ_tran_sisid"
    ];

    public static $rules = [
        "typ_tran_description"  =>  "required|max:120",
        "typ_tran_sisid"        =>  "required|max:3"
    ];
}
