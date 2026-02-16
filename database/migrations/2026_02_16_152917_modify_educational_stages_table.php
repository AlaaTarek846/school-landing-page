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
        Schema::table('educational_stages', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->text('description_ar')->nullable()->after('title_en');
            $table->text('description_en')->nullable()->after('description_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('educational_stages', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->dropColumn(['description_ar', 'description_en']);
        });
    }
};
