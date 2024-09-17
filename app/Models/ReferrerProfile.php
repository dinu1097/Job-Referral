<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferrerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'position',
        'company_id',
        'user_id',
    ];
}
