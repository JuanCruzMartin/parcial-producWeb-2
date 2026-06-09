<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente');
            $table->string('marca');
            $table->string('modelo');
            $table->text('descripcion_falla');
            $table->date('fecha_ingreso');
            $table->enum('estado', ['Ingresado', 'En reparación', 'Reparado', 'Entregado'])->default('Ingresado');
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
        Schema::dropIfExists('reparaciones');
    }
}
