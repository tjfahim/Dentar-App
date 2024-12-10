<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
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
