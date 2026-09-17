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
    Schema::create('project_goals', function (Blueprint $table) {
        $table->id();
        $table->foreignId('project_id')->constrained()->onDelete('cascade');
        $table->integer('year');
        $table->integer('month');
        
        // Metas
        $table->decimal('goal_revenue', 12, 2)->default(0);
        $table->integer('goal_leads')->default(0);
        $table->integer('goal_clients')->default(0);
        $table->decimal('max_cac', 12, 2)->default(0);
        $table->decimal('min_roi', 8, 2)->default(0);
        $table->decimal('min_roas', 8, 2)->default(0);
        
        $table->timestamps();
        $table->unique(['project_id', 'year', 'month']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_goals');
    }
};
