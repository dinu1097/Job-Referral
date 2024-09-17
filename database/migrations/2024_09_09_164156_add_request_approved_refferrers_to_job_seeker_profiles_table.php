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
        Schema::table('job_seeker_profiles', function (Blueprint $table) {
            // Adding a new JSON column for request approved referrers
            $table->json('request_approved_refferrers')->nullable()->after('resume');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_seeker_profiles', function (Blueprint $table) {
            // Dropping the column if we roll back
            $table->dropColumn('request_approved_refferrers');
        });
    }
};
