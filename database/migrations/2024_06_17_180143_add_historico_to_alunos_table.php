<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHistoricoToAlunosTable extends Migration
{
    public function up()
    {
        Schema::table('aluno', function (Blueprint $table) {
            $table->json('historico')->nullable();
        });
    }

    public function down()
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->dropColumn('historico');
        });
    }
}
