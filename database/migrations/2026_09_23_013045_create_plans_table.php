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
    Schema::create('plans', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nome do plano (Ex: Start, Growth)
        $table->string('slug')->unique(); // Url amigável (Ex: plano-growth)
        $table->text('short_description'); // Resumo para o card da listagem
        $table->text('full_description'); // Descrição completa interna
        $table->text('features'); // Itens inclusos (pode ser separado por quebras de linha)
        $table->decimal('price', 10, 2)->default(0.00); // Preço (futuro preenchimento)
        $table->string('whatsapp_message'); // Mensagem personalizada que vai direto pro seu whats
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
