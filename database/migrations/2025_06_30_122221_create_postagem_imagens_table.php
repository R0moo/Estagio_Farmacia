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
        Schema::create('postagem_imagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postagem_id');
            $table->string('caminho'); 
            $table->string('legenda')->nullable();
            $table->timestamps();

            $table->foreign('postagem_id')->references('id')->on('postagens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postagem_imagens');
    }
};
