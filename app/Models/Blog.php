<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'user_id', 'user_type', 'file', 'status'
    ];

    public function student_user()
    {
        return $this->belongsTo(Student::class, 'user_id', 'id');
    }

    public function patient_user()
    {
        return $this->belongsTo(Patient::class, 'user_id', 'id');
    }


    public function doctor_user()
    {
        return $this->belongsTo(Doctor::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class)->whereNull('comment_id');
    }
}
