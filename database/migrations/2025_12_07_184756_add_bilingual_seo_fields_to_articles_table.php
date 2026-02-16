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
        Schema::table('articles', function (Blueprint $table) {
            // Add bilingual SEO fields
            $table->string('focus_keyphrase_ar')->nullable()->after('synonyms_keyphrase');
            $table->string('focus_keyphrase_en')->nullable()->after('focus_keyphrase_ar');
            $table->string('seo_title_ar')->nullable()->after('focus_keyphrase_en');
            $table->string('seo_title_en')->nullable()->after('seo_title_ar');
            $table->text('meta_description_ar')->nullable()->after('seo_title_en');
            $table->text('meta_description_en')->nullable()->after('meta_description_ar');
            $table->json('tags_ar')->nullable()->after('meta_description_en');
            $table->json('tags_en')->nullable()->after('tags_ar');
            $table->string('synonyms_keyphrase_ar')->nullable()->after('tags_en');
            $table->string('synonyms_keyphrase_en')->nullable()->after('synonyms_keyphrase_ar');
            $table->string('canonical_url_ar')->nullable()->after('synonyms_keyphrase_en');
            $table->string('canonical_url_en')->nullable()->after('canonical_url_ar');
            
            // Add image metadata fields
            $table->integer('image_width')->nullable()->after('canonical_url_en');
            $table->integer('image_height')->nullable()->after('image_width');
            $table->string('image_mime')->nullable()->after('image_height');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn([
                'focus_keyphrase_ar',
                'focus_keyphrase_en',
                'seo_title_ar',
                'seo_title_en',
                'meta_description_ar',
                'meta_description_en',
                'tags_ar',
                'tags_en',
                'synonyms_keyphrase_ar',
                'synonyms_keyphrase_en',
                'canonical_url_ar',
                'canonical_url_en',
                'image_width',
                'image_height',
                'image_mime',
            ]);
        });
    }
};
