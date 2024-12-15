<?php

namespace App\Http\Controllers\API\V1\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Resources\CaseResource;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\UserResource;
use App\Models\Doctor;
use App\Models\PatientProblem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    // public function caseList()
    // {
    //     $doctor = Auth::user();

    //     return CaseResource::collection($doctor->cases);
    // }

    public function addReport($id)
    {
        $case = PatientProblem::find($id);

        if(!$case){
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }


        return request()->all();
    }

    public function doctor_list(Request $request)
    {

        $filter = null;
        $filter = $request->filter;

        if($filter == 'blog'){
            $doctors = Doctor::withCount('blogs')->having('blogs_count', '>', 0)->orderby('blogs_count', 'desc')->get();
        }else{
            $doctors = Doctor::all();
        }

        return response()->json([
            'message' => "All Doctor Lists",
            'success' => true,
            'data' => UserResource::collection($doctors)
        ]);
    }

    // public function blogDoctorList()
    // {
    //     $doctors = Doctor::withCount('blogs')->having('blogs_count', '>', 0)->orderby('blogs_count', 'desc')->get();

    //     return $doctors;

    //     return response()->json([
    //         'message' => "All Doctor blog writing doctor list",
    //         'success' => true,
    //         'data' => 'good'
    //     ]);
    // }
}
