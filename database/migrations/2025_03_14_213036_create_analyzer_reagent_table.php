<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('analyzer_reagent', function (Blueprint $table) {
            $table->id();
            $table->foreignId('analyzer_id')->constrained('analyzers')->cascadeOnDelete();
            $table->foreignId('reagent_id')->constrained('reagents')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyzer_reagent');
    }
};
