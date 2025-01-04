<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone' ,
        'token',
        'password' ,
        'image',
        'address',
        'dob'  ,
        'gender' ,
        'medical_history' ,
        'organization',
        'occupation'

    ];


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

    public function prescriptionReadCases() {
        return $this->hasMany(PrescriptionRead::class, 'user_id', 'id');
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
