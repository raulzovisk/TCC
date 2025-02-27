<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ficha', function (Blueprint $table) {
            $table->id();
            $table->text('nome')->notNullable();
            $table->string('descricao', 255)->notNullable();
            $table->date('data')->notNullable();
            $table->unsignedBigInteger('id_aluno');
            $table->foreign('id_aluno')->references('id')->on('aluno')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('ficha');
    }
};
