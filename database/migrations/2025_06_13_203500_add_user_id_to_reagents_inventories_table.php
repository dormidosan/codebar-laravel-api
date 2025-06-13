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
        Schema::table('reagent_inventories', function (Blueprint $table) {
            if (!Schema::hasColumn('reagent_inventories', 'user_id')) {
                $table->foreignId('user_id')
                    ->default(1) // Default to 1, assuming user with ID 1 is the system user
                    ->after('expiration_date')
                    ->comment('User who created the reagent inventory record')
                    ->constrained('users')
                    ->restrictOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reagent_inventories', function (Blueprint $table) {
            if (Schema::hasColumn('reagent_inventories', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }
};
