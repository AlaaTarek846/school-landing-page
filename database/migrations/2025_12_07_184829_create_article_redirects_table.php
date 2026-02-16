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
        Schema::create('article_redirects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
            $table->string('old_slug_ar')->nullable();
            $table->string('old_slug_en')->nullable();
            $table->string('new_slug_ar')->nullable();
            $table->string('new_slug_en')->nullable();
            $table->string('locale')->default('ar'); // ar or en
            $table->integer('redirect_type')->default(301); // 301, 302, etc.
            $table->integer('hits')->default(0);
            $table->timestamps();
            
            $table->index(['old_slug_ar', 'locale']);
            $table->index(['old_slug_en', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_redirects');
    }
};
