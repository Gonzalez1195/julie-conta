<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasilla169sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casilla169s', function (Blueprint $table) {
            $table->id();
            $table->string('nit_sujeto', 14)->nullable();
            $table->date('fecha_emision')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->string('numero_resolucion', 100)->nullable();
            $table->string('serie_documento', 100)->nullable();
            $table->string('numero_documento', 100)->nullable();
            $table->float('monto_sujeto', 8, 2)->nullable();
            $table->float('monto_percepcion', 8, 2)->nullable();
            $table->string('dui_sujeto', 9)->nullable();
            $table->char('numero_anexo')->default('9');
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
        Schema::dropIfExists('casilla169s');
    }
}
