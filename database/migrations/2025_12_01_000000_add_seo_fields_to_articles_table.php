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
        Schema::table('articles', function (Blueprint $table) {
            $table->string('focus_keyphrase')->nullable()->after('content_en');
            $table->string('seo_title')->nullable()->after('focus_keyphrase');
            $table->string('slug')->nullable()->unique()->after('seo_title');
            $table->text('meta_description')->nullable()->after('slug');
            $table->json('tags')->nullable()->after('meta_description');
            $table->string('synonyms_keyphrase')->nullable()->after('tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn([
                'focus_keyphrase',
                'seo_title',
                'slug',
                'meta_description',
                'tags',
                'synonyms_keyphrase'
            ]);
        });
    }
};





