<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasilla161sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casilla161s', function (Blueprint $table) {
            $table->id();
            $table->string('nit_agente_efectuo_anticipo_cuenta', 14)->nullable();
            $table->date('fecha_emision_documento')->nullable();
            $table->string('serie_documento', 100)->nullable();
            $table->string('numero_documento', 100)->nullable();
            $table->float('monto_sujeto', 8, 2)->default('0.00');
            $table->float('monto_anticipo_cuenta_iva', 8, 2)->default('0.00');
            $table->string('dui_agente', 9)->nullable();
            $table->char('numero_anexo')->default('6');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('casilla161s');
    }
}
