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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            // $table->string('name', 255)->index()->unique()->default();
            $table->timestamps(); //captura o tempo, data, hora, dia
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories'); //é usado quando for usado o comando fresh que é necessário para adicionar colunas, excluir e afins então vai ser feito a exclusão e recriação da tabela
    }
};
