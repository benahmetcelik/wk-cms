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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('image', 500);
            $table->string('link', 100);
            $table->string('description', 500);
            $table->string('button_text', 100);
            $table->string('button_color', 100);
            $table->string('button_text_color', 100);
            $table->string('button_link', 100);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
