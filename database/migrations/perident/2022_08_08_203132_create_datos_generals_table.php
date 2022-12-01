<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_generales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_nac');
            $table->string('estado_civil');
            $table->text('direccion');
            $table->string('telefono');
            $table->string('profesion_ocupacion');
            $table->text('lugar_trabajo');
            $table->string('correo');
            $table->string('odontologo_ant')->nullable();
            $table->string('odontologo_ant_tel')->nullable();
            $table->string('medico_personal')->nullable();
            $table->string('medico_personal_tel')->nullable();
            $table->string('medio_enterar')->nullable();
            $table->boolean('hospitalizado')->nullable();
            $table->text('hospitalizado_motivo')->nullable();
            $table->boolean('tratamiento_actual')->nullable();
            $table->text('tratamiento_motivo_medicamentos')->nullable();
            $table->json('condiciones')->nullable();
            $table->foreignId('recomendante_id')->nullable()->constrained();
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
        Schema::dropIfExists('datos_generales');
    }
}

// To Migrate

// php artisan migrate --path=/database/migrations/perident

// To Rollback

// php artisan migrate:rollback --path=/database/migrations/perident
