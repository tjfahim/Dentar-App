<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\PatientProblem;

class Student extends Authenticatable
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


    public function cases()
    {
        return $this->hasMany(Diognostic::class, 'patient_id', 'id');
    }
}
