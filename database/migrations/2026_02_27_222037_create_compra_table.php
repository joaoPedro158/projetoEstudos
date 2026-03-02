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
        Schema::create('compra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('endereco_id')->constrained('endereco')->onDelete('cascade');
            $table->string('status');
            $table->bigInteger('id_pagamento')->nullable();
            $table->string('metodo_pagamento')->nullable();
            $table->bigInteger('id_ordem_pagamento')->nullable();
            $table->string('referencia_externa')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra');
    }
};
