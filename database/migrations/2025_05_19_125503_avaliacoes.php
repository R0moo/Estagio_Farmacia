<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::create('avaliacoes', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('estudante_id');
        $table->unsignedBigInteger('curso_id');

        // Campos CC (1 a 13)
        for ($i = 1; $i <= 13; $i++) {
            $table->tinyInteger("cc_$i")->nullable()->check("cc_$i BETWEEN 1 AND 5");
        }

        // Campos RC (1 a 7)
        for ($i = 1; $i <= 7; $i++) {
            $table->tinyInteger("rc_$i")->nullable()->check("rc_$i BETWEEN 1 AND 5");
        }

        // Campos AG (1 a 7)
        for ($i = 1; $i <= 7; $i++) {
            $table->tinyInteger("ag_$i")->nullable()->check("ag_$i BETWEEN 1 AND 5");
        }

        $table->text('comentario')->nullable();
        $table->timestamps();

        $table->foreign('estudante_id')->references('id')->on('estudantes');
        $table->foreign('curso_id')->references('id')->on('cursos');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
public function down()
{
    Schema::dropIfExists('avaliacoes');
}
};
