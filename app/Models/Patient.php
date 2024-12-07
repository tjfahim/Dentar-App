<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use HasApiTokens;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone' ,
        'password' ,
        'image',
        'address',
        'dob'  ,
        'gender' ,
        'medical_history' ,

    ];


    public function cases()
    {
        return $this->hasMany(PatientProblem::class);
    }
}
