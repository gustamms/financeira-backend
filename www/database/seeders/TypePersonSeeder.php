<?php

namespace Database\Seeders;

use App\Models\TypePerson;

use Illuminate\Database\Seeder;

class TypePersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypePerson::create(
            [
                'typ_description'   => 'Física',
                'typ_sisid'         => 'FIS'
            ]
        );
        TypePerson::create(
            [
                'typ_description'   => 'Lojista',
                'typ_sisid'         => 'LOJ'
            ]
        );
    }
}
