<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypePerson extends Model
{
    protected $table = 'type_person';
    protected $primaryKey = 'typ_id';

    protected $fillable = [
        'typ_description', 
    ];

    public static $rules = [
        "typ_description" => "required|max:120",
    ];
}