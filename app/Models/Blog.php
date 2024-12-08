<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'user_id', 'user_type',
    ];

    public function student_user()
    {
        return $this->belongsTo(Student::class, 'user_id', 'id');
    }

    
    public function doctor_user()
    {
        return $this->belongsTo(Doctor::class, 'user_id', 'id');
    }
}
