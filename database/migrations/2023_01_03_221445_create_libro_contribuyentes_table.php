<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroContribuyentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_contribuyentes', function (Blueprint $table) {
            $table->id();
            $table->string('correlativo')->nullable();
            $table->date('fecha_emision')->nullable();
            $table->char('numero_correlativo_preimpreso')->nullable();
            $table->char('numero_control_interno_sistema_formulario_unico', 2)->nullable();
            $table->string('nombre_cliente_mandante_mandatario', 100)->nullable();
            $table->string('nrc_cliente', 100)->nullable();
            $table->float('ventas_exentas', 8, 2)->nullable();
            $table->float('ventas_internas_gravadas', 8, 2)->nullable();
            $table->float('debito_fiscal', 8, 2)->nullable();
            $table->float('ventas_exentas_cuenta_terceros', 8, 2)->nullable();
            $table->float('ventas_internas_gravadas_cuenta_tercero', 8, 2)->nullable();
            $table->float('debito_fiscal_cuenta_terceros', 8, 2)->nullable();
            $table->float('iva_percibido', 8, 2)->nullable();
            $table->float('total', 8, 2)->nullable();

            $table->string('nombre_contribuyente')->nullable();
            $table->string('mes')->nullable();
            $table->string('year')->nullable();
            $table->string('nrc')->nullable();
            $table->string('folio')->nullable();

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
        Schema::dropIfExists('libro_contribuyentes');
    }
}
