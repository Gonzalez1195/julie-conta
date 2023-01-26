<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_resolucion')->nullable();
            $table->string('clase_documento')->nullable();
            $table->string('desde_preimpreso')->nullable();
            $table->string('hasta_preimpreso')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->string('tipo_detalle')->nullable();
            $table->string('numero_serie', 13)->nullable();
            $table->string('desde')->nullable();
            $table->string('hasta', 13)->nullable();
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
        Schema::dropIfExists('detalle_documentos');
    }
}
