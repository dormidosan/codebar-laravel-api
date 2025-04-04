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
            $table->foreignId('barcode_type_id')->default(1)->constrained('barcode_types')->cascadeOnDelete();
            $table->string('barcode', 255);
            $table->string('image', 255)->nullable();
            $table->string('lot', 255)->nullable();
            $table->date('expiration_date');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();

            // unique constraint for reagent_id and barcode
            $table->unique(['reagent_id', 'barcode']);
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
