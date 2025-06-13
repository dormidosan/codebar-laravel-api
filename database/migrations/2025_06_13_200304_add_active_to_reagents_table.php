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
        Schema::table('reagents', function (Blueprint $table) {
            if (!Schema::hasColumn('reagents', 'active')) {
                $table->boolean('active')->default(false)->after('volume')->comment('Indicates if the reagent is active or not');
            }
            if (!Schema::hasColumn('reagents', 'position')) {
                $table->integer('position')->default(0)->after('active')->comment('Indicates the position in the list of reagents in frontend');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reagents', function (Blueprint $table) {
            if (Schema::hasColumn('reagents', 'active')) {
                $table->dropColumn('active');
            }
            if (Schema::hasColumn('reagents', 'position')) {
                $table->dropColumn('position');
            }
        });
    }
};
