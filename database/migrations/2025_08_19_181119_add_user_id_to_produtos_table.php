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
        Schema::table('produtos', function (Blueprint $table) {
            // Adiciona a coluna para o ID do usuário
            $table->foreignId('user_id')
                  ->constrained() // Cria a chave estrangeira para a tabela 'users'
                  ->onDelete('cascade'); // Remove o produto se o usuário for deletado
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            // Remove a chave estrangeira e a coluna
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
