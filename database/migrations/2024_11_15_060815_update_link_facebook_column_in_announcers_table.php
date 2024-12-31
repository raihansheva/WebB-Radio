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
        Schema::table('announcers', function (Blueprint $table) {
            $table->renameColumn('link_facebook', 'link_tiktok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcers', function (Blueprint $table) {
            $table->renameColumn('link_tiktok', 'link_facebook');
        });
    }
};
