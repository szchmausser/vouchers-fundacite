<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cedula');
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->date('fecha_ingreso');
            $table->string('tipo_contrato');
            $table->string('profesion');
            $table->string('departamento');
            $table->string('cargo');
            $table->string('observaciones');
            $table->boolean('activo');
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
        Schema::dropIfExists('empleados');
    }
}
