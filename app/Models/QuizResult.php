<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'score',
        'wrong_answer',
        'correct_answer',
        'user_id',
        'user_type',
        'quiz_manage_id'
    ];
    
    
     public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'user_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'user_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'user_id', 'id');
    }
}
