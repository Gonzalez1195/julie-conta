<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('planillas')) {
            Schema::create('planillas', function (Blueprint $table) {
                $table->id();
                $table->integer('dias_laborados');
                $table->integer('hed');
                $table->integer('hen');
                $table->double('vacaciones', 8, 2);
                $table->double('viaticos/movilidad', 8, 2);
                $table->double('otros', 8, 2);
                $table->double('total_devengado', 8, 2);
                $table->double('isss', 8, 2);
                $table->double('afp', 8, 2);
                $table->double('renta', 8, 2);
                $table->double('otros_desc', 8, 2);
                $table->double('ret_laboral', 8, 2);
                $table->double('total_pagar', 8, 2);
                $table->string('tipo_planilla', 50);
                $table->double('insafort', 8, 2);
                $table->double('isss_patrono', 8, 2);
                $table->double('afp_patrono', 8, 2);
                $table->double('total_patrono', 8, 2);
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
        Schema::dropIfExists('planillas');
    }
}
