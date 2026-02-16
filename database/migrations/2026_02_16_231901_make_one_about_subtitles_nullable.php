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
        Schema::table('one_about', function (Blueprint $table) {
            $table->string('title_color_ar')->nullable()->change();
            $table->string('title_color_en')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('one_about', function (Blueprint $table) {
            $table->string('title_color_ar')->nullable(false)->change();
            $table->string('title_color_en')->nullable(false)->change();
        });
    }
};
