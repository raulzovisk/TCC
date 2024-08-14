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
        Schema::create('aluno', function (Blueprint $table) {
            $table->id();
            $table->double('altura')->notNullable();
            $table->double('peso')->notNullable();
            $table->char('genero')->notNullable();
            $table->integer('gordura')->notNullable();
            $table->integer('musculo')->notNullable();
            $table->integer('idade')->notNullable();
            $table->json('historico')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
