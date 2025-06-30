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
    Schema::create('cursos', function (Blueprint $table) {
        $table->id();
        $table->string('titulo', 100);
        $table->text('resumo');
        $table->integer('vagas');
        $table->text('materiais')->nullable();
        $table->integer('carga_horaria');
        $table->date('data_inicio');
        $table->date('data_fim');
        $table->text('imagem')->nullable();
        $table->unsignedBigInteger('projeto_id');
        $table->foreign('projeto_id')->references('id')->on('projetos')->onDelete('cascade');;
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
        Schema::dropIfExists('cursos');
    }
};
