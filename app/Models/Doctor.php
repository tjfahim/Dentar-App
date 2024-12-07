<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $fillable = [
        'name',        // Doctor's name
        'email',       // Email address
        'phone',       // Phone number
        'password',    // Password
        'specialization', // Medical specialization
        'hospital',    // Hospital or clinic the doctor works at
        'gender',      // Gender
        'biography',   // Biography of the doctor
        'dob',         // Date of birth
        'degree',      // Degree or qualifications
        'image',       // Doctor's image
        'signature',   // Doctor's signature image
        'role',        // Role (normal or admin)
        'address',     // Doctor's address
    ];


    public function cases()
    {
        return $this->hasMany(PatientProblem::class);
    }
}
