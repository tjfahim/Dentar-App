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
        'problem',
        'patient_type',
        'patient_id',
        'doctor_id'
    ];


    
}
