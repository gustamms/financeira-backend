<?php

namespace Database\Seeders;

use App\Models\TypeTransactions;

use Illuminate\Database\Seeder;

class TypeTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeTransactions::create(
            [
                'typ_tran_description'   => 'Transferencia',
                'typ_tran_sisid'         => 'TRS'
            ]
        );
    }
}
