<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\QuizManage;
use App\Models\QuizQuestionAnsManage;
use App\Models\QuizQuestionManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuizQuestionManageApi extends Controller
{
    public function getQuiz(Request $request)
    {
        $quizzes = QuizManage::with(['quizQuestionManage' => function ($query) {
            $query->where('status', 1); // Include only active questions
        }])->where('status', 1) // Include only active quizzes
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Quiz retrieved successfully',
            'data' => $quizzes,
        ], 200);
    }


    public function submitquiz(Request $request){
        $validator = Validator::make($request->all(), [
            'quiz_answer_manages' => 'required|array',
            'quiz_answer_manages.*.quiz_question_manages_id' => 'required|exists:quiz_question_manages,id',
            'quiz_answer_manages.*.user_answer' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = Auth::user();
        $correctAnswers = 0;
        $wrongAnswers = 0;
        $totalPoints = 0;
        $now = now();

        if ($user) {
            $quizAnsweredIds = [];
            foreach ($request->quiz_answer_manages as $quizData) {
                $quizQuestionManage = QuizQuestionManage::findOrFail($quizData['quiz_question_manages_id']);

                $quizQuestionAnswerManage = QuizQuestionAnsManage::where('user_id', $user->id)
                    ->where('quiz_question_manages_id', $quizQuestionManage->id)
                    ->first();

                if (!$quizQuestionAnswerManage) {
                    $quizQuestionAnswerManage = new QuizQuestionAnsManage;
                    $quizQuestionAnswerManage->unique_quiz_id = $quizQuestionManage->quiz_manage_id . "_" .$user->id;
                }

                $quizQuestionAnswerManage->user_id = $user->id;
                $quizQuestionAnswerManage->quiz_question_manages_id = $quizQuestionManage->id;
                $quizQuestionAnswerManage->user_answer = $quizData['user_answer'];

                if (strcasecmp($quizQuestionManage->answer, $quizData['user_answer']) == 0) {
                    $quizQuestionAnswerManage->answer_is_correct = 1;
                    $correctAnswers += 1;
                    $quizQuestionAnswerManage->points = $quizQuestionManage->points;
                    $totalPoints += $quizQuestionManage->points;
                } else {
                    $quizQuestionAnswerManage->answer_is_correct = 0;
                    $wrongAnswers += 1;
                    $quizQuestionAnswerManage->points = 0;
                }

                $quizQuestionAnswerManage->status = 1;
                $quizQuestionAnswerManage->updated_at = $now;
                $quizQuestionAnswerManage->save();

                $quizAnsweredIds[] = $quizQuestionAnswerManage->id;
            }

            $answeredResults = QuizQuestionAnsManage::with(['user', 'quizQuestion'])
                ->whereIn('id', $quizAnsweredIds)
                ->get();

            $user->total_points = $user->total_points + $totalPoints;
            $user->save();
            return response()->json([
                'success' => 'Answers submitted successfully',
                'answered_results' => $answeredResults,
                'no_of_correct_answers' => $correctAnswers,
                'no_of_wrong_answers' => $wrongAnswers,
                'total_points' => $totalPoints
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }


    }
}
