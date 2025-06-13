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
        Schema::table('laboratories', function (Blueprint $table) {
            if (!Schema::hasColumn('laboratories', 'type')) {
                $table->integer('type')
                    ->default(1) // Default to 0, indicating not specified
                    ->after('name')
                    ->comment('1- public, 2- private, 3- veterinary, 4- research, 5- other, 0- not specified');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laboratories', function (Blueprint $table) {
            if (Schema::hasColumn('laboratories', 'type')) {
                $table->dropColumn('type');
            }
        });
    }
};
