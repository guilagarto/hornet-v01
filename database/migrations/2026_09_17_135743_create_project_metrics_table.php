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
    Schema::create('project_metrics', function (Blueprint $table) {
        $table->id();
        $table->foreignId('project_id')->constrained()->onDelete('cascade');
        $table->integer('year');
        $table->integer('month');
        $table->string('channel')->default('all'); // Ex: google_ads, meta_ads, organic, all
        
        // Investimento
        $table->decimal('investment_total', 12, 2)->default(0);
        $table->decimal('investment_paid_media', 12, 2)->default(0);
        
        // Aquisição
        $table->integer('visitors')->default(0);
        $table->integer('leads')->default(0);
        $table->integer('leads_qualified')->default(0);
        $table->integer('opportunities')->default(0);
        $table->integer('clients_acquired')->default(0);
        
        // Marketing
        $table->integer('reach')->default(0);
        $table->integer('impressions')->default(0);
        $table->integer('clicks')->default(0);
        $table->integer('engagement')->default(0);
        $table->integer('followers')->default(0);
        
        // Financeiro
        $table->decimal('revenue_generated', 12, 2)->default(0);
        $table->integer('sales_count')->default(0);
        $table->decimal('ticket_manual', 12, 2)->nullable(); // Caso informado diretamente
        
        $table->timestamps();
        
        // Impede duplicidade do mesmo período/canal para o mesmo projeto
        $table->unique(['project_id', 'year', 'month', 'channel']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_metrics');
    }
};
