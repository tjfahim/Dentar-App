<?php

namespace App\Http\Controllers\API\V1\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Resources\CaseResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function caseList()
    {
        $doctor = Auth::user();

        return CaseResource::collection($doctor->cases);
    }
}
