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
        Schema::create('reagent_inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reagent_id')->constrained('reagents')->cascadeOnDelete();
            $table->string('codebar', 255);
            $table->string('image', 255)->nullable();
            $table->string('lot', 255);
            $table->dateTime('expiration_date');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reagent_inventories');
    }
};
