<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class JobSeekerProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($job_seeker_id = 1; $job_seeker_id <= 10; $job_seeker_id++) {
            DB::table('job_seeker_profiles')->insert([
                'user_id' => $job_seeker_id,
                'full_name' => 'Job Seeker ' . $job_seeker_id,
                'email' => 'jobseeker' . $job_seeker_id . '@example.com',
                'phone_number' => '555-123-45' . str_pad($job_seeker_id, 2, '0', STR_PAD_LEFT),
                'current_job_title' => 'Software Engineer',
                'industry' => 'Technology',
                'experience_years' => rand(1, 10),
                'skills' => json_encode(['PHP', 'Laravel', 'JavaScript', 'HTML', 'CSS']), // JSON array of skills
                'education' => json_encode([
                    'degree' => 'Bachelor\'s in Computer Science',
                    'institution' => 'University of Technology',
                    'graduation_year' => 2015 + rand(0, 5)
                ]), // JSON object for education
                'location' => 'City ' . $job_seeker_id,
                'expected_salary' => rand(50000, 90000),
                'current_salary' => rand(40000, 80000),
                'availability' => 'Immediately',
                'resume' => 'resume_' . $job_seeker_id . '.pdf',
                'linkedin_profile' => 'https://linkedin.com/in/jobseeker' . $job_seeker_id,
                'github_profile' => 'https://github.com/jobseeker' . $job_seeker_id,
                'leetcode_profile' => 'https://leetcode.com/jobseeker' . $job_seeker_id,
                'portfolio_website' => 'https://jobseeker' . $job_seeker_id . '.portfolio.com',
                'certifications' => json_encode(['Certified Laravel Developer', 'AWS Certified']), // JSON array of certifications
                'languages' => json_encode(['English', 'Spanish']), // JSON array of languages
                'achievements' => 'Built a SaaS platform, Contributed to open source projects',
                'previous_jobs' => json_encode([
                    ['company' => 'Company A', 'position' => 'Junior Developer', 'years' => 2],
                    ['company' => 'Company B', 'position' => 'Mid-level Developer', 'years' => 3]
                ]), // JSON array of previous jobs
                'highest_degree' => 'Bachelor\'s Degree',
                'institution' => 'University of Technology',
                'gpa' => rand(3, 4) . '.' . rand(0, 9),
                'willing_to_relocate' => rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
