<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'token',
        'address',
        'dob',
        'password',
        'gender',
        'university',
        'year',
        'specialization',
        'medical_history',
        'additional_info',
        'bio',
        'organization',
        'occupation'
    ];
}
