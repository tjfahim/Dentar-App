<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\QuizManage;
use App\Models\QuizResult;
use App\Models\QuizQuestionAnsManage;
use App\Models\QuizQuestionManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class QuizQuestionManageApi extends Controller
{
public function getQuiz(Request $request)
{
    $time = Carbon::now();
    $bdtime =  Carbon::now('Asia/Dhaka')->format('Y-m-d\TH:i');
    // return $bdtime;
    // return $time . " --- ". $bdtime;
    $quizzes = QuizManage::where('end_time', '>=', $bdtime)->where('status', 1)->get();
    
    $auth_id = Auth::user()->id;

    $quizzes = $quizzes->filter(function($quiz) use($auth_id) {
        if($quiz->user){
            $users = json_decode($quiz->user);
            foreach($users as $id){
                if($id == $auth_id){
                    return $quiz;
                }
            }
        }
        return false;
    });
    

    
    
    $quizQuestionManage = QuizQuestionManage::where('status', 1)->get();
    
    
    

   

    // Transform each question to include options
    $quizQuestionManage->each(function ($question) {
        $question->options = array_filter([
            $question->option_1,
            $question->option_2,
            $question->option_3,
            $question->option_4,
        ]);
        unset($question->option_1, $question->option_2, $question->option_3, $question->option_4);
    });

    // Attach questions to each quiz
    $quizzes->each(function ($quiz) use ($quizQuestionManage) {
        $quiz->questions = $quizQuestionManage
            ->where('quiz_manage_id', $quiz->id)
            ->values(); // Reindex the questions collection
    });
    
    foreach($quizzes as $index => $value){
        $value->id = $index + 1;
    }


    return response()->json([
        'success' => true,
        'message' => 'Quiz retrieved successfully',
        'data' => $quizzes->toArray(), 
    ], 200);
}




    public function submitquiz(Request $request){
        
        // $q = QuizQuestionManage::all();
        
        // return $q;
        
        
        //  $validator = Validator::make($request->all(), [
        //     'quiz_answer_manages' => 'required|array',
        //     'quiz_answer_manages.*.quiz_question_manages_id' => 'required',
        //     'quiz_answer_manages.*.user_answer' => 'required',
        // ]);
        
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
        $quiz_id = null;
        $now = now();

        if ($user) {
            $quizAnsweredIds = [];
            foreach ($request->quiz_answer_manages as $quizData) {
                $quizQuestionManage = QuizQuestionManage::findOrFail($quizData['quiz_question_manages_id']);
                
                
                $quiz_id =  $quizQuestionManage->quiz_manage_id;
                

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
                
                // return $quizQuestionManage;
                // check the answer start
               if ($quizQuestionManage->question_type == 'answer_type') {
                    // Case-insensitive comparison for text input answers
                    $isCorrect = strcasecmp($quizQuestionManage->answer, $quizData['user_answer']) === 0;
                } else {
                    // Case-sensitive comparison for options/multiple choice
                    $isCorrect = $quizQuestionManage->answer === $quizData['user_answer'];
                }
                
                if ($isCorrect) {
                    $quizQuestionAnswerManage->answer_is_correct = 1;
                    $correctAnswers++;
                    $quizQuestionAnswerManage->points = $quizQuestionManage->points;
                    $totalPoints += $quizQuestionManage->points;
                } else {
                    $quizQuestionAnswerManage->answer_is_correct = 0;
                    $wrongAnswers++;
                    $quizQuestionAnswerManage->points = 0;
                }
                // check the answer end


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
            
         
            $find = QuizResult::where('user_id', $user->id)->where('quiz_manage_id', $quiz_id)->first();
            
           
            
            if(!$find){
                $result = QuizResult::create([
                    'score' => $totalPoints,
                    'wrong_answer' => $wrongAnswers,
                    'correct_answer' => $correctAnswers,
                    'user_id' => $user->id,
                    'user_type' => $user->userType,
                    'quiz_manage_id' => $quiz_id
                ]);
            }
            
            
            
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
