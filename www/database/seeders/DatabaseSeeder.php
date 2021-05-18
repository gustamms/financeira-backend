<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypePersonSeeder::class);
        $this->call(TypeTransactionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TransactionsSeeder::class);
    }
}
