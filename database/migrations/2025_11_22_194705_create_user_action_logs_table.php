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
        Schema::create('user_action_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->ipAddress()->comment('IP address of the user accessing the system');
            $table->string('url')->comment('URL accessed by the user');
            $table->string('method')->comment('HTTP method used for the request (GET, POST, etc.)');
            $table->string('user_agent')->comment('User agent of the user accessing the system');
            $table->json('payload')->nullable()->comment('Payload of the request');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_action_logs');
    }
};
