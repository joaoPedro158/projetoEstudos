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
        Schema::create('itens_compra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compra_id')->constrained('compra')->onDelete('cascade');
            $table->foreignId('produto_id')->constrained('produtos');
            $table->decimal('preco_unitario', 8, 2);
            $table->integer('quantidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_compra');
    }
};
