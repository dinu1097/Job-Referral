<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerProfile extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone_number',
        'current_job_title',
        'industry',
        'experience_years',
        'skills',
        'education',
        'location',
        'expected_salary',
        'availability',
        'resume',
    ];

    protected $casts = [
        'skills' => 'array',
        'education' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'job_seeker_category');
    }
}
