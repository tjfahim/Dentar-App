<?php

namespace App\Http\Controllers\API\V1;

use App\Models\QuizResult;
use App\Models\QuizManage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizResultController extends Controller
{
    public function index()
    {
        $leaderboard = QuizManage::where('leaderboard', 'active')->first();
    
        if (!$leaderboard) {
            return response()->json(['message' => 'No active leaderboard found'], 404);
        }
    
        $results = QuizResult::where('quiz_manage_id', $leaderboard->id)
            ->orderByDesc('score')             // Top scorer first
            ->orderBy('created_at')            // Older entries first if tie
            ->get();
    
        $data = $results->map(function ($res, $index) {
            // Dynamically load the user based on type
            if ($res->user_type === 'doctor') {
                $user = $res->doctor; // Assuming relationship is defined
            } elseif ($res->user_type === 'student') {
                $user = $res->student;
            } else {
                $user = $res->patient;
            }
    
            return [
                'id' => $index + 1,
                'name' => $user->name ?? 'Unknown',
                'score' => $res->score,
                'image' => isset($user->image) ? asset($user->image) : '',
                'created_at' => $res->created_at->toDateTimeString(),
            ];
        });
    
        return response()->json([
            'message' => $leaderboard->name,
            'data' => $data->values() // reset keys
        ]);
    }


    
    
    // public function index()
    // {
        
    //     $leaderboard = QuizManage::where('leaderboard', 'active')->first();
    //     $results = QuizResult::where('quiz_manage_id', $leaderboard->id)->get();
        
        
    //     foreach($results as $res){
    //         if($res->user_type == 'doctor') {
    //             $res->load('doctor');
    //         }elseif($res->user_type == 'student'){
    //              $res->load('student');
    //         }else{
    //             $res->load('patient');
    //         }
    //     }
        
    //     return $results;
        
        
    
    //     return response()->json([
    //         'message' => $leaderboard->name,
    //         'data' => [
    //             [
    //                 'id' => 1,
    //                 'name' => 'John Doe',
    //                 'score' => 1500,
    //                 'image' => 'https://via.placeholder.com/150',
    //             ],
    //             [
    //                 'id' => 2,
    //                 'name' => 'Jane Smith',
    //                 'score' => 1400,
    //                 'image' => 'https://via.placeholder.com/150',
    //             ],
    //             [
    //                 'id' => 3,
    //                 'name' => 'Alice Johnson',
    //                 'score' => 1350,
    //                 'image' => 'https://via.placeholder.com/150',
    //             ],
    //             [
    //                 'id' => 4,
    //                 'name' => 'Bob Brown',
    //                 'score' => 1300,
    //                 'image' => 'https://via.placeholder.com/150',
    //             ],
    //         ]
    //     ]);
    // }
}
