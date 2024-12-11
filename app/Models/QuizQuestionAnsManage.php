<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestionAnsManage extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_quiz_id',
        'user_id',
        'user_type',
        'quiz_question_manages_id',
        'user_answer',
        'answer_is_correct',
        'points',
        'status',
    ];

    public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

    public function quizQuestion()
    {
        return $this->belongsTo(QuizQuestionManage::class, 'quiz_question_manages_id');
    }

}
