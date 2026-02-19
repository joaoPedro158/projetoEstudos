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
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
        // Chave estrangeira ligando ao usuário
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        $table->string('cep', 9);
        $table->string('logradouro');
        $table->string('numero');
        $table->string('complemento')->nullable();
        $table->string('bairro');
        $table->string('cidade');
        $table->char('estado', 2);

        // Tipo: casa, trabalho, parente, etc.
        $table->string('tipo')->default('casa');

        // Identificar o endereço padrão do cliente
        $table->boolean('principal')->default(false);

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endereco');
    }
};
