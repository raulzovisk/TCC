<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedidasCorporaisTable extends Migration
{
    public function up()
    {
        Schema::create('medidas_corporais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aluno');
            $table->foreign('id_aluno')->references('id')->on('aluno')->onDelete('cascade');
            $table->date('data_medida');
            $table->float('peso');
            $table->float('altura');
            $table->float('cintura');
            $table->float('quadril');
            $table->float('peito');
            $table->float('braco_direito');
            $table->float('braco_esquerdo');
            $table->float('coxa_direita');
            $table->float('coxa_esquerda');
            $table->float('gordura');
            $table->string('genero'); 
            $table->json('historico_medidas')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medidas_corporais');
    }
}
