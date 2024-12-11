<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diognostic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'number',
        'image',
        'problem_title',
        'problem',
        'patient_type',
        'patient_id',
        'doctor_id'
    ];



    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'patient_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }



}
