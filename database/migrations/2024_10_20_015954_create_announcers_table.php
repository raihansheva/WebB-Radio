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
        Schema::create('announcers', function (Blueprint $table) {
            $table->id();
            $table->string('name_announcer', 255);
            $table->string('image_announcer');
            $table->string('link_instagram')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_twitter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcers');
    }
};
