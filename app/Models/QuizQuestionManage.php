<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestionManage extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_manage_id',
        'question',
        'answer',
        'option_1',
        'option_2',
        'option_3',
        'question_type',
        'option_4',
        'points',
        'status',
    ];

    public function quizManage()
    {
        return $this->belongsTo(QuizManage::class);
    }

   

}
