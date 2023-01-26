<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasilla108sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casilla108s', function (Blueprint $table) {
            $table->id();
            $table->string('nit_nrc_mandante', 14)->nullable();
            $table->string('nombre_razon_social_denominacion')->nullable();
            $table->date('fecha_emision')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->string('serie_documento')->nullable();
            $table->string('numero_resolucion', 100)->nullable();
            $table->string('numero_documento', 100)->nullable();
            $table->float('monto_operacion', 8, 2)->default('0.00');
            $table->float('iva_operacion', 8, 2)->default('0.00');
            $table->string('num_serie_comprobante_liquidacion', 100)->nullable();
            $table->string('num_resolucion_comprobante_liquidacion', 100)->nullable();
            $table->string('num_comprobante_liquidacion', 100)->nullable();
            $table->date('fecha_emision_comprobante_liquidacion')->nullable();
            $table->string('dui_cliente', 9)->nullable();
            $table->char('numero_anexo')->default('4');
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
        Schema::dropIfExists('casilla108s');
    }
}
