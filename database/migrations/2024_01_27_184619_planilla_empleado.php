<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlanillaEmpleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('planilla_empleados')) {
            Schema::create('planilla_empleados', function (Blueprint $table) {
                $table->id();
                $table->foreignId('empleado_id')->constrained('empleados');
                $table->foreignId('planilla_id')->constrained('planillas');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('planilla_empleados');
    }
}
