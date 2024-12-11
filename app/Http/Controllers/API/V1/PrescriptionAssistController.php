<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrescriptionAssistResource;
use App\Models\PrescriptionAssist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PrescriptionAssistController extends Controller
{
    public function index()
    {

        $user = Auth::user();


        switch($user->userType){
            case 'student':
                $prescriptions = $user->prescriptions;
                break;
            case 'patient':
                $prescriptions = $user->prescriptions;
                break;
            case 'doctor' :
                $prescriptions = PrescriptionAssist::latest()->get();
                break;
        }


        foreach($prescriptions as $prescription){
                $prescription->load('replayDoctor');
                switch($prescription->userType){
                    case 'student':
                        $prescription->load('student');
                        break;
                    case 'patient':
                        $prescription->load('patient');
                        break;
                    case 'doctor' :
                        $prescription->load('doctor');
                        break;
                }

        }


        return response()->json([
            'message'=> 'Prescription data',
            'success'=> true,
            'prescription' => PrescriptionAssistResource::collection($prescriptions)
        ]);
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable',
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }


        if ($request->hasFile('image')) {

            $fileName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images/prescriptions/'), $fileName);

            $imagePath = 'images/prescriptions/' . $fileName;
        }

        $user = Auth::user();

        $prescription = PrescriptionAssist::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath ?? '',
            'user_id' => $user->id,
            'userType' => $user->userType,
        ]);


        return response()->json([
            'message' => 'Prescription Assist create successfully!',
            'prescriptionAssist' => $prescription
        ], 200);


    }
}
