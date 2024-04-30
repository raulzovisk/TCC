<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ficha', function (Blueprint $table) {
            $table->id();
            $table->text('objetivo')->notNullable();
            $table->string('descricao', 255)->notNullable();
            $table->date('data')->notNullable();
            $table->unsignedBigInteger('id_instrutor')->nullable(); 
            $table->unsignedBigInteger('id_aluno');
            $table->foreign('id_instrutor')->references('id')->on('instrutor')->onDelete('set null');
            $table->foreign('id_aluno')->references('id')->on('aluno');
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
