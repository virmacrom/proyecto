<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->required();
            $table->string('apellidos')->required();
            $table->string('dni')->unique()->required();
            $table->string('nuhsa')->unique()->required();
            $table->date('fecha_nacimiento');
            $table->string('direccion');
            $table->string('telefono')->required();
            $table->string('operado');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
