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
        Schema::create('job_seeker_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('current_job_title');
            $table->string('industry');
            $table->integer('experience_years');
            $table->json('skills');
            $table->json('education');
            $table->string('location');
            $table->decimal('expected_salary', 8, 2);
            $table->decimal('current_salary', 8, 2)->nullable(); // Added field for current salary
            $table->string('availability');
            $table->string('resume')->nullable();
            // New fields for rankings
            $table->string('linkedin_profile')->nullable();
            $table->string('github_profile')->nullable();
            $table->string('leetcode_profile')->nullable();
            $table->string('portfolio_website')->nullable();
            $table->json('certifications')->nullable();
            $table->json('languages')->nullable();
            $table->text('achievements')->nullable();
            $table->json('previous_jobs')->nullable(); // To store previous job details (number of jobs)
            $table->string('highest_degree')->nullable();
            $table->string('institution')->nullable();
            $table->decimal('gpa', 4, 2)->nullable(); // GPA or grade, optional
            $table->boolean('willing_to_relocate')->default(false);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seeker_profiles');
    }
};
