<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizManage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'status',
        'leaderboard',
        'user'
    ];

    public function quizQuestionManage()
    {
        return $this->hasMany(QuizQuestionManage::class, 'quiz_manage_id');
    }
    
}
