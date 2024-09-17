<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
    ];

    public function jobSeeker()
    {
        return $this->belongsTo(User::class, 'job_seeker_id');
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }
}
