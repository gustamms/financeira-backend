<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id('use_id');
            $table->unsignedBigInteger('typ_id');
            $table->string('use_cpf_cnpj', 14)->unique();
            $table->string('use_mail')->unique();
            $table->string('use_name');
            $table->string('password');
            $table->timestamps();
        });

        Schema::table('user', function (Blueprint $table) {
            $table->foreign('typ_id')->references('typ_id')->on('type_person');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
