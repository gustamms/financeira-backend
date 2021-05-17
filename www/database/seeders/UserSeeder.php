<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'typ_id'        =>  1,
                'use_cpf_cnpj'  =>  '96243480143',
                'use_mail'      =>  'ggabrielaaliceramos@fictor.com.br',
                'use_name'      =>  'Gabriela Alice Ramos',
                'password'      =>  app('hash')->make('1234')
            ]
        );

        User::create(
            [
                'typ_id'        =>  2,
                'use_cpf_cnpj'  =>  '06752811000125',
                'use_mail'      =>  'cobranca@leticiaeisabeltelecomltda.com.br',
                'use_name'      =>  'Letícia e Isabel Telecom Ltda',
                'password'      =>  app('hash')->make('12345')
            ]
        );
    }
}
