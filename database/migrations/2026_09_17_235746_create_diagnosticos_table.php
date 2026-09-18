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
    Schema::create('diagnosticos', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('email');
        $table->string('whatsapp');
        $table->string('empresa')->nullable();
        $table->string('tipo_negocio');
        $table->string('canal_venda');
        $table->string('objetivo');
        $table->string('possui_site');
        $table->string('anuncia_google');
        $table->string('recebe_contatos');
        $table->string('google_perfil');
        $table->string('conversao_representa');
        $table->string('valor_medio');
        $table->string('pacote_sugerido'); // Guarda qual pacote o sistema recomendou
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosticos');
    }
};
