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
        // Testimonials: Check and Rename
        Schema::table('testimonials', function (Blueprint $table) {
            if (Schema::hasColumn('testimonials', 'name') && !Schema::hasColumn('testimonials', 'name_ar')) {
                $table->renameColumn('name', 'name_ar');
            }
            if (Schema::hasColumn('testimonials', 'job') && !Schema::hasColumn('testimonials', 'job_ar')) {
                $table->renameColumn('job', 'job_ar');
            }
            if (Schema::hasColumn('testimonials', 'description') && !Schema::hasColumn('testimonials', 'description_ar')) {
                $table->renameColumn('description', 'description_ar');
            }
        });

        // Testimonials: Add new columns if they don't exist
        Schema::table('testimonials', function (Blueprint $table) {
            if (!Schema::hasColumn('testimonials', 'name_en')) {
                $table->string('name_en')->nullable()->after('name_ar');
            }
            if (!Schema::hasColumn('testimonials', 'job_en')) {
                $table->string('job_en')->nullable()->after('job_ar');
            }
            if (!Schema::hasColumn('testimonials', 'description_en')) {
                $table->text('description_en')->nullable()->after('description_ar');
            }
        });

        // Teams: Check and Rename
        Schema::table('teams', function (Blueprint $table) {
             if (Schema::hasColumn('teams', 'name') && !Schema::hasColumn('teams', 'name_ar')) {
                $table->renameColumn('name', 'name_ar');
            }
            if (Schema::hasColumn('teams', 'job') && !Schema::hasColumn('teams', 'job_ar')) {
                $table->renameColumn('job', 'job_ar');
            }
        });

        // Teams: Add new columns if they don't exist
        Schema::table('teams', function (Blueprint $table) {
            if (!Schema::hasColumn('teams', 'name_en')) {
                $table->string('name_en')->nullable()->after('name_ar');
            }
            if (!Schema::hasColumn('teams', 'job_en')) {
                $table->string('job_en')->nullable()->after('job_ar');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            if (Schema::hasColumn('testimonials', 'name_en')) {
                $table->dropColumn(['name_en']);
            }
             if (Schema::hasColumn('testimonials', 'job_en')) {
                $table->dropColumn(['job_en']);
            }
             if (Schema::hasColumn('testimonials', 'description_en')) {
                $table->dropColumn(['description_en']);
            }

            if (Schema::hasColumn('testimonials', 'name_ar')) {
                $table->renameColumn('name_ar', 'name');
            }
            if (Schema::hasColumn('testimonials', 'job_ar')) {
                $table->renameColumn('job_ar', 'job');
            }
            if (Schema::hasColumn('testimonials', 'description_ar')) {
                $table->renameColumn('description_ar', 'description');
            }
        });

        Schema::table('teams', function (Blueprint $table) {
            if (Schema::hasColumn('teams', 'name_en')) {
                $table->dropColumn(['name_en']);
            }
            if (Schema::hasColumn('teams', 'job_en')) {
                $table->dropColumn(['job_en']);
            }

            if (Schema::hasColumn('teams', 'name_ar')) {
                $table->renameColumn('name_ar', 'name');
            }
            if (Schema::hasColumn('teams', 'job_ar')) {
                $table->renameColumn('job_ar', 'job');
            }
        });
    }
};
