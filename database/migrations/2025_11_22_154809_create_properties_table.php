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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('slug_ar')->unique();
            $table->string('slug_en')->unique();
            $table->text('description_en');
            $table->text('description_ar');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('property_type_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->enum('type', ['apartment', 'villa']);
            $table->integer('bathroom')->nullable();
            $table->integer('bedroom')->nullable();
            $table->integer('living_room')->nullable();
            $table->integer('kitchen')->nullable();
            $table->integer('garden')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('parking')->nullable();
            $table->integer('number_house')->nullale();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
