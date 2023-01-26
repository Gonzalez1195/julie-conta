<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasilla162sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casilla162s', function (Blueprint $table) {
            $table->id();
            $table->string('nit_agente', 14)->nullable();
            $table->date('fecha_emision')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->string('serie_documento', 100)->nullable();
            $table->string('numero_documento', 100)->nullable();
            $table->float('monto_sujeto', 8, 2)->nullable();
            $table->float('monto_retencion', 8, 2)->nullable();
            $table->string('dui_agente', 9)->nullable();
            $table->char('numero_anexo')->default('7');
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
        Schema::dropIfExists('casilla162s');
    }
}
