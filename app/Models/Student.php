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
        'image',
        'password',
        'gender',
        'university',
        'year',
        'specialization',
        'medical_history',
        'additional_info',
        'bio',
        'organization',
        'occupation',
        'notification_play'

    ];
    
    public function getAddressAttribute($value)
    {
        if(preg_match("/^\d+$/", $value)){
            return District::find($value)?->name;
        }
        
        return $value;
    }
    
     public function getSpecializationAttribute($value)
    {
        if (preg_match('/^\d+$/', $value)) {
            return DoctorSpecialty::find($value)?->name;
        }
    
        return $value;
    }
    
    public function getHospitalAttribute($value)
    {
        if (preg_match('/^\d+$/', $value)) {
            return Hospital::find($value)?->name;
        }
    
        return $value;
    }


    public function cases()
    {
        return $this->hasMany(Diognostic::class, 'patient_id', 'id');
    }

    public function prescriptions()
    {
        return $this->hasMany(PrescriptionAssist::class, 'user_id', 'id');
    }


    public function UnknownMedicineCase()
    {
        return $this->hasMany(UnknownMedicine::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->morphMany(BlogComment::class, 'commentable');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id', 'id');
    }
}
