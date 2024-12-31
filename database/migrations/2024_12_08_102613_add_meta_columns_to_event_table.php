<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('meta_title')->nullable()->after('status'); // Kolom meta title
            $table->text('meta_description')->nullable()->after('meta_title'); // Kolom meta description
            $table->string('meta_keywords')->nullable()->after('meta_description'); // Kolom meta keywords
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['meta_title', 'meta_description', 'meta_keywords']);
        });
    }
};
