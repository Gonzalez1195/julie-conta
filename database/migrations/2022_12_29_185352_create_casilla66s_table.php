<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasilla66sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casilla66s', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento')->nullable();
            $table->string('numero_nit_dui_otro', 14)->nullable();
            $table->string('nombre_razonsocial_denominacion')->nullable();
            $table->date('fecha_emision_documento')->nullable();
            $table->string('numero_serie_documento')->nullable();
            $table->string('numero_documento', 100)->nullable();
            $table->float('monto_operacion', 8, 2)->default('0.00');
            $table->float('monto_retencion_iva', 8, 2)->default('0.00');
            $table->char('numero_anexo')->default('5');
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
        Schema::dropIfExists('casilla66s');
    }
}
