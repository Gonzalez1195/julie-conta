<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumidorFinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumidor_finals', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_emision')->nullable();
            $table->string('clase_documento')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->string('numero_resolucion', 100)->nullable();
            $table->string('serie_documento', 100)->nullable();
            $table->string('num_cont_int_del', 100)->nullable();
            $table->string('num_cont_int_al', 100)->nullable();
            $table->string('num_documento_del', 100)->nullable();
            $table->string('num_documento_al', 100)->nullable();
            $table->string('num_maquina_registradora', 14)->nullable();
            $table->float('ventas_exentas', 8, 2)->nullable();
            $table->float('ventas_int_exentas_no_suj_proporcionalidad', 8, 2)->nullable();
            $table->float('ventas_no_sujetas', 8, 2)->nullable();
            $table->float('ventas_gravadas_locales', 8, 2)->nullable();
            $table->float('exp_adentro_area_ca', 8, 2)->nullable();
            $table->float('exp_fuera_area_ca', 8, 2)->nullable();
            $table->float('exp_servicio', 8, 2)->nullable();
            $table->float('ventas_zonas_francas_dpa', 8, 2)->nullable();
            $table->float('ventas_cuenta_terc_no_domiciliados', 8, 2)->nullable();
            $table->float('total_ventas', 8, 2)->nullable();
            $table->char('numero_anexo')->default('2');
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
        Schema::dropIfExists('consumidor_finals');
    }
}
