<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnexoContribuyentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexo_contribuyentes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_emision')->nullable();
            $table->string('clase_documento')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->string('numero_resolucion', 100)->nullable();
            $table->string('serie_documento', 100)->nullable();
            $table->string('num_cont_int_del', 100)->nullable();
            $table->string('num_cont_int_al', 100)->nullable();
            $table->string('nit_nrc_cliente')->nullable();
            $table->string('nombre_razonsocial_denominacion')->nullable();
            $table->float('ventas_exentas', 8, 2)->nullable();
            $table->float('ventas_no_sujetas', 8, 2)->nullable();
            $table->float('ventas_gravadas_locales', 8, 2)->nullable();
            $table->float('debito_fiscal', 8, 2)->nullable();
            $table->float('ventas_cuenta_terc_no_domiciliados', 8, 2)->nullable();
            $table->float('debito_fiscal_ventas_a_cuenta_terceros', 8, 2)->nullable();
            $table->float('total_ventas', 8, 2)->nullable();
            $table->string('dui_cliente')->nullable();
            $table->char('numero_anexo')->default('1');
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
        Schema::dropIfExists('anexo_contribuyentes');
    }
}
