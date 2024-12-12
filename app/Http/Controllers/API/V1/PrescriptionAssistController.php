<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrescriptionAssistResource;
use App\Models\PrescriptionAssist;
use App\Models\PrescriptionAssistReplay;
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
                $prescription->load('replayDoctor', 'reports');

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

        return $prescriptions;

        return response()->json([
            'message'=> 'Prescription data',
            'success'=> true,
            'prescription' => PrescriptionAssistResource::collection($prescriptions)
        ]);
    }

    public function store(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|file',
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
            'prescriptionAssist' => new PrescriptionAssistResource($prescription)
        ], 200);

    }



    public function replayAssist(Request $request, $id)
    {
        $prescription = PrescriptionAssist::find($id);

        if(!$prescription){
            return response()->json([
                'message' => 'undefine prescription',
                'success' => false,
            ], 404);
        }


        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'files_url' => 'nullable|string',
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $file = explode(',', $request->files_url);




        $replay = PrescriptionAssistReplay::create([
            'title' => $request->title,
            'description' => $request->description,
            'files_url' => json_encode($file),
            'doctor_id' => Auth::user()->id,
            'prescription_assist_id' => $id
        ]);

        $prescription->replay_user_id = Auth::user()->id;
        $prescription->replay_user_type = Auth::user()->userType;
        $prescription->save;


        if($replay){
            return response()->json([
                'message' => "Prescription assist replay successfully",
                'success' => true,
                'data' => $replay
            ]);
        }

    }

}
