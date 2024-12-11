<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionAssist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'user_id',
        'userType',
        'replay_user_type',
        'replay_user_id'
    ];





    public function patient()
    {
        return $this->belongsTo(Patient::class, 'user_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'user_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'user_id', 'id');
    }

    public function replayDoctor()
    {
        return $this->belongsTo(Doctor::class, 'replay_user_id', 'id');
    }
}
