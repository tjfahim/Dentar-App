<?php

namespace App\Http\Controllers\API\V1\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Resources\CaseResource;
use App\Models\PatientProblem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function caseList()
    {
        $doctor = Auth::user();

        return CaseResource::collection($doctor->cases);
    }


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
}
