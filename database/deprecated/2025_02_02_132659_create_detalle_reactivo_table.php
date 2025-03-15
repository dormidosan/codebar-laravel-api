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
        Schema::create('detalle_reactivo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reactivo_id')->constrained('reactivos')->cascadeOnDelete();
            $table->string('codebar', 255);
            $table->string('imagen', 255)->nullable();
            $table->string('lote', 255);
            $table->dateTime('vencimiento');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_reactivo');
    }
};
