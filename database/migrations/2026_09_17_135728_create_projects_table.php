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
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->foreignId('client_id')->constrained()->onDelete('cascade');
        $table->string('name');
        $table->text('services_contracted');
        $table->text('objectives')->nullable();
        $table->date('start_date');
        $table->date('end_date_predicted')->nullable();
        $table->decimal('monthly_investment', 12, 2)->default(0);
        $table->enum('status', ['planning', 'active', 'paused', 'completed'])->default('active');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
