<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_compras', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_emision')->nullable();
            $table->string('numero_documento', 100)->nullable();
            $table->string('numero_registro_contribuyente', 100)->nullable();
            $table->string('nombre_proveedor')->nullable();
            $table->float('compras_exentas_internas', 8, 2)->nullable();
            $table->float('importaciones_internaciones_exentas', 8, 2)->nullable();
            $table->float('compras_internas_gravadas', 8, 2)->nullable();
            $table->float('importaciones_internaciones_gravadas', 8, 2)->nullable();
            $table->float('credito_fiscal', 8, 2)->nullable();
            $table->float('anticipo_cuenta_iva_percibido', 8, 2)->nullable();
            $table->float('total_compras', 8, 2)->nullable();
            $table->float('compras_sujetos_excluidos', 8, 2)->nullable();
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
        Schema::dropIfExists('libro_compras');
    }
}
