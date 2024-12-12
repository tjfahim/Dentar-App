<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Doctor;
use App\Models\Diognostic;
use App\Http\Controllers\Controller;
use App\Http\Resources\DiognosticResource;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade\Pdf;

class DiognosticController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $cases = $user->cases()->with('doctor')->get();


        foreach($cases as $case){
            if($case->patient_type === 'patient'){
                $case->load('patient');
            }elseif($case->patient_type === 'student'){
                $case->load('student');
            }
        }


        return DiognosticResource::collection($cases);

        // if($user->userType == 'doctor'){
        //     return DiognosticResource::collection($user->cases);
        // }elseif($user->userType == 'student'){
        //     return DiognosticResource::collection($user->cases);
        // }
    }

    public function add(Request $request)
    {

        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|string',
            'gender' => 'nullable|string',
            'number' => 'required|string|max:20',
            'image' => 'nullable|string', // Optional image with max size 2MB
            'problem' => 'required|string',
            'problem_title' => 'string|nullable',
        ]);

        // Handle file upload for the image, if provided
        // if ($request->hasFile('image')) {
        //     $validated['image'] = $request->file('image')->store('patient_images', 'public');
        // }

        $user = Auth::user();
        $doctor_id = null;

        $doctors = Doctor::where('role', 'admin')->get();
        $length = count($doctors);


        foreach ($doctors as $index => $doctor) {
           // return gettype($doctor->nextPatient);
            if ($doctor->nextPatient) {
                // Assign doctor_id and handle nextPatient logic
                $doctor_id = $doctor->id;
                $doctor->nextPatient = false; // Set current doctor to false
                $doctor->save();

                // Set the next doctor as the next patient
                $nextIndex = ($index + 1) % $length; // Wrap around if we're at the last doctor
                $doctors[$nextIndex]->nextPatient = true;
                $doctors[$nextIndex]->save();

                break; // Exit the inner loop once a doctor is assigned
            }
        }


        $attributes = [...$validated, 'patient_id' => $user->id, 'patient_type' => $user->userType, 'doctor_id' => $doctor_id];



        // Add the patient problem record to the database
        $patientProblem = Diognostic::create($attributes);

        // Return a JSON response
        return response()->json([
            'message' => 'Patient Case added successfully!',
            'data' => new DiognosticResource($patientProblem),
        ], 201);
    }


    public function report(Request $request, $id)
    {
        $case = Diognostic::find($id);

        $validator = validator()->make($request->all(), [
            'note'=> 'nullable|string',
            'medicines.*.name' => 'required|string',
            'medicines.*.dose' => 'required|array',
            'medicines.*.meal' => 'required|string',
            'medicines.*.duration' => 'required|string'
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $perscription =new Prescription();
        $perscription->diognostic_id = $case->id;
        $perscription->note = "good note";
        $perscription->save();


        $medicines = $request->medicines;


        foreach($medicines as $med){
            $perscription->medicines()->create([
                'name' => $med['name'],
                'prescription_id' => $perscription->id,
                'dose' => json_encode($med['dose']),
                'meal' => $med['meal'],
                'duration' => $med['duration']
            ]);
        }

        $perscription = $perscription->medicines;


        $pdf = Pdf::loadView('pdfview.prescription', ['data' => $perscription]);


        return $pdf->download();



        return response()->json([
            'message' => 'Prescription add Succssfully!',
            'success' => true,

        ]);

    }

}
