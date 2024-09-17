<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = [
        'job_seeker_profile_id',
        'referrer_id',
        'status',
        'referral_message',
        'user_id',
    ];

    public function jobSeekerProfile()
    {
        return $this->belongsTo(JobSeekerProfile::class);
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }
    public function referrerProfile()
    {
        return $this->belongsTo(ReferrerProfile::class, 'referrer_id', 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

}
