<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionAssistReplay extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'files_url',
        'doctor_id',
        'prescription_assist_id'
    ];


    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
    
}
