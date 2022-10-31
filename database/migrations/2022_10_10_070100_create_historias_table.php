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
        Schema::create('qrv_historias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('n_cliente')->constrained();
            $table->unsignedBigInteger('n_paciente')->constrained();
            $table->unsignedBigInteger('n_vacuna')->constrained();

            //Foraneas
            $table->foreign('n_cliente')->references('id')->on('qrv_clientes');
            $table->foreign('n_paciente')->references('id')->on('qrv_pacientes');
            $table->foreign('n_vacuna')->references('id')->on('qrv_vacunas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qrv_historias');
    }
};