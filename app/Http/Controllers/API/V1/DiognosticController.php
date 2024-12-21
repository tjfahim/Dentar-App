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
use Illuminate\Support\Facades\Validator;

class DiognosticController extends Controller
{
    public function index()
    {
        $user = Auth::user();



        $cases = $user->cases()->with('doctor','prescription.medicines')->get();



        // $cases = $user->cases()->with('doctor', 'prescrption')->get();


        foreach($cases as $case){
            if($case->patient_type === 'patient'){
                $case->load('patient');
            }elseif($case->patient_type === 'student'){
                $case->load('student');
            }
        }


        $cases  = $cases->sortByDesc('id')->values();



        return DiognosticResource::collection($cases);

        // if($user->userType == 'doctor'){
        //     return DiognosticResource::collection($user->cases);
        // }elseif($user->userType == 'student'){
        //     return DiognosticResource::collection($user->cases);
        // }
    }

    public function add(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'age' => 'required|string',
            'gender' => 'nullable|string',
            'number' => 'string|max:20',
            'file' => 'nullable|string',
            'problem' => 'required|string',
            'problem_title' => 'string|nullable',
        ]);

        if($request->file){
            $files = explode(',', $request->file);
            $files = json_encode($files);
        }else{
            $files = '';
        }

        $attributes = $request->all();

        $attributes = [...$attributes, 'file' => $files];




       if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
       }




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


        $attributes = [...$attributes, 'patient_id' => $user->id, 'patient_type' => $user->userType, 'doctor_id' => $doctor_id];



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

        if(!$case){
            return response()->json([
                'errors' => 'Case not found'
            ], 404);
        }


        if($case->doctor_id !== Auth::user()->id){
            return response()->json([
               'message' => 'You are not authorized to view this case'
            ], 403);
        }



        $validator = Validator::make($request->all(), [
            'note'=> 'nullable|string',
            'medicines' => 'required',
            'medicines.*.name' => 'required|string',
            'medicines.*.dose' => 'required|array',
            'medicines.*.meal' => 'required|string',
            'medicines.*.duration' => 'required|string'
        ]);



        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }


        $prescription =new Prescription();
        $prescription->diognostic_id = $case->id;
        $prescription->note = $request->note ?? '';
        $prescription->save();


        $medicines = $request->medicines;


        foreach($medicines as $med){
            $prescription->medicines()->create([
                'name' => $med['name'],
                'prescription_id' => $prescription->id,
                'dose' => json_encode($med['dose']),
                'meal' => $med['meal'],
                'duration' => $med['duration']
            ]);
        }

        $allMedicine = $prescription->medicines;


        $pdf = Pdf::loadView('pdfview.prescription', [
            'patient' => $case,
            'data' => $allMedicine,
            'doctor' => Auth::user(),
            'prescription' => $prescription
        ]);

        $path = public_path('files/prescriptions/');
        $filePath = 'files/prescriptions/prescription_'. $prescription->id . '.pdf';


        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }


        file_put_contents($path .'prescription_'.  $prescription->id . '.pdf', $pdf->output());

        $prescription->report_file = $filePath;
        $prescription->save();


        return response()->json([
            'message' => 'Prescription add Succssfully!',
            'success' => true,
            'data' => $prescription
        ], 201);

    }

}
