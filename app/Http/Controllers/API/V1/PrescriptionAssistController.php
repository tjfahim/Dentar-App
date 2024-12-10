<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\PrescriptionAssist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionAssistController extends Controller
{
    public function index()
    {

        $user = Auth::user();


        switch($user->userType){
            case 'student':
                $prescription = $user->prescriptions;
                break;
            case 'patient':
                $prescription = $user->prescriptions;
                break;
            case 'doctor' :
                $prescription = PrescriptionAssist::latest()->get();
                break;
        }

        return response()->json([
            'message'=> 'Prescription data',
            'success'=> true,
            'prescription' => $prescription
        ]);
    }

    public function store()
    {
        
    }
}
