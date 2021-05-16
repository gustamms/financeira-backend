<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('tran_id');
            $table->unsignedBigInteger('typ_tran_id');
            $table->unsignedBigInteger('use_id_payer');
            $table->unsignedBigInteger('use_id_payee');
            $table->float('tran_value');
            $table->timestamps();
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('typ_tran_id')->references('typ_tran_id')->on('type_transactions');
            $table->foreign('use_id_payer')->references('use_id')->on('user');
            $table->foreign('use_id_payee')->references('use_id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
