<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientProblem extends Model
{
    use HasFactory;


    protected $fillable = ['patient_id', 'doctor_id', 'name', 'age', 'number', 'image', 'problem'];

}
