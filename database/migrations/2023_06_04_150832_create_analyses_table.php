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
        Schema::create('analyses', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('user_agent');
            $table->string('url');
            $table->string('method');
            $table->string('query_string');
            $table->string('referer');
            $table->string('route_name');
            $table->string('route_action');
            $table->string('route_middleware');
            $table->string('session_id');
            $table->string('session_data');
            $table->integer('is_active')->default(1);
            $table->integer('is_ajax')->default(0);
            $table->integer('is_secure')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyses');
    }
};
