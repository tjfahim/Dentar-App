<?php

namespace App\Http\Controllers\API\V1\Patinet;

use App\Models\PatientProblem;
use App\Http\Controllers\Controller;
use App\Http\Resources\CaseResource;
use App\Http\Resources\PatientProblemResource;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientProblemController extends Controller
{
    public function problemList()
    {
        $user = Auth::user();

        $cases = $user->cases;

        return CaseResource::collection($cases);
    }


    public function store(Request $request)
    {

        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
            'gender' => 'required|string',
            'number' => 'required|string|max:20',
            'image' => 'nullable|image|max:2048', // Optional image with max size 2MB
            'problem' => 'required|string',
        ]);

        // Handle file upload for the image, if provided
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('patient_images', 'public');
        }

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


        $attributes = [...$validated, 'patient_id' => $user->id, 'doctor_id' => $doctor_id];



        // Add the patient problem record to the database
        $patientProblem = PatientProblem::create($attributes);

        // Return a JSON response
        return response()->json([
            'message' => 'Patient Case added successfully!',
            'data' => new CaseResource($patientProblem),
        ], 201);
    }

}
