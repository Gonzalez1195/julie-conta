<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnexoComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexo_compras', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_emision')->nullable();
            $table->string('clase_documento')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->string('numero_documento', 100)->nullable();
            $table->string('nit_nrc_proveedor')->nullable();
            $table->string('nombre_proveedor')->nullable();
            $table->float('compras_internas_exentas', 8, 2)->nullable();
            $table->float('internaciones_exentas_no_sujetas', 8, 2)->nullable();
            $table->float('importaciones_exentas_no_sujetas', 8, 2)->nullable();
            $table->float('compras_internas_gravadas', 8, 2)->nullable();
            $table->float('internaciones_gravadas_bienes', 8, 2)->nullable();
            $table->float('importaciones_gravadas_bienes', 8, 2)->nullable();
            $table->float('importaciones_gravadas_servicios', 8, 2)->nullable();
            $table->float('credito_fiscal', 8, 2)->nullable();
            $table->float('total_compras', 8, 2)->nullable();
            $table->string('dui_proveedor', 9)->nullable();
            $table->char('numero_anexo')->default('3');
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
        Schema::dropIfExists('anexo_compras');
    }
}
