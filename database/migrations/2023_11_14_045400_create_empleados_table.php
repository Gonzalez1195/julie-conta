<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('1er_nombre', 100);
            $table->string('2do_nombre', 100);
            $table->string('1er_apellido', 100);
            $table->string('2do_apellido', 100);
            $table->string('cargo', 100);
            $table->double('salario', 8, 2);
            $table->string('NIT/DUI_afiliado', 15);
            $table->string('tipo_documento', 50);
            $table->string('cod_previsional', 50);
            $table->string('cod_obs1', 50);
            $table->string('cod_obs2', 50);
            $table->foreignId('patrono_id')->constrained('patronos');
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
