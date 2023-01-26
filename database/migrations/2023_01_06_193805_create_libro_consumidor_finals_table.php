<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroConsumidorFinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_consumidor_finals', function (Blueprint $table) {
            $table->id();
            $table->string('correlativo')->nullable();
            $table->date('documento_emitido_del')->nullable();
            $table->date('documento_emitido_al')->nullable();
            $table->string('n_caja_sistema_computarizado')->nullable();

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
        Schema::dropIfExists('libro_consumidor_finals');
    }
}
