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
        Schema::create('exercicio_ficha', function (Blueprint $table) {
            $table->unsignedBigInteger('id_exercicio');
            $table->unsignedBigInteger('id_ficha');
            $table->string('repeticoes');
            $table->string('series');
            $table->string('observacoes',255);

            
            $table->foreign('id_exercicio')->references('id')->on('exercicio')->onDelete('cascade');
            $table->foreign('id_ficha')->references('id')->on('ficha')->onDelete('cascade');
            $table->primary(['id_exercicio', 'id_ficha']);
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
