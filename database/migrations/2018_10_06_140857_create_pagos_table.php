<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->unsignedInteger('empleado_id');
            $table->unsignedInteger('concepto_id');
            $table->integer('monto');
            
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('concepto_id')->references('id')->on('conceptos');
            
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
        Schema::dropIfExists('pagos');
    }
}
