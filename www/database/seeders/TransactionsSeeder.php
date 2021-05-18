<?php

namespace Database\Seeders;

use App\Models\Transactions;

use Illuminate\Database\Seeder;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transactions::create(
            [
                'typ_tran_id'   => 1,
                'use_id_payer'  => 2,
                'use_id_payee'  => 1,
                'tra_value'    => 100
            ]
        );
    }
}
