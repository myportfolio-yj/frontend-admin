<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrv_vacunas', function (Blueprint $table) {
            $table->id('n_vacuna');
            $table->string('v_nombre');
            $table->string('v_apuntes');
            $table->integer('n_expira');
            $table->unsignedBigInteger('a_n_iduser');

            //Foraneas
            $table->foreign('a_n_iduser')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qrv_vacunas');

    }
};
