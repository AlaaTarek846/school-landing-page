<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Project;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_challenge_solutions', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('sort')->default(0);
            $table->foreignIdFor(Project::class,'project_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_challenge_solutions');
    }
};
