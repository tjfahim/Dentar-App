<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\PrescriptionRead;
use App\Models\PrescriptionReadReport;
use App\Http\Resources\UnknownMedicineResource;

class PrescriptionReadController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $with_report = [];
        $without_report = [];

        if ($user->userType == 'doctor') {
            $prescriptions = PrescriptionRead::with(['report.doctor'])->latest()->get();


            foreach($prescriptions as $case){
                if(count($case['report'])) {
                    $with_report[] = $case;
                    continue;
                }
                $without_report[] = $case;
            }

            return response()->json([
                'message' => "All Prescription Read List",
                'success' => true,
                'data' => [
                    'with_report' => UnknownMedicineResource::collection($with_report),
                    'without_report' => UnknownMedicineResource::collection($without_report),
                ]
            ]);

            // return UnknownMedicineResource::collection($prescriptions);
        }

        $prescriptions = $user->prescriptionReadCases->load('report.doctor');


        $prescriptionCases = $prescriptions->map(function ($item) {
            if ($item->user_type == 'patient') {
                return $item->load('patient');
            } elseif ($item->user_type == 'student') {
                return $item->load('student');
            }
        });



        foreach($prescriptionCases as $case){
            if(count($case['report'])) {
                $with_report[] = $case;
                continue;
            }
            $without_report[] = $case;
        }

        return response()->json([
            'message' => "All Prescription Read List",
            'success' => true,
            'data' => [
                'with_report' => UnknownMedicineResource::collection($with_report),
                'without_report' => UnknownMedicineResource::collection($without_report),
            ]
        ]);



        // return UnknownMedicineResource::collection($prescriptionCases);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'file' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $files = $request->file ? explode(',', $request->file) : '';

        $case = PrescriptionRead::create([
            'title' => $request->title,
            'description' => $request->description,
            'files' => json_encode($files),
            'user_id' => Auth::id(),
            'user_type' => Auth::user()->userType,
        ]);

        return response()->json([
            'message' => 'Added successfully',
            'success' => true,
            'case' => $case,
        ]);
    }

    public function addReport(Request $request, $id)
    {
        $prescription = PrescriptionRead::find($id);

        if (!$prescription) {
            return response()->json([
                'errors' => 'Case not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'file' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $files = $request->file ? explode(',', $request->file) : '';

        $report = PrescriptionReadReport::create([
            'title' => $request->title,
            'description' => $request->description,
            'files' => json_encode($files),
            'doctor_id' => Auth::id(),
            'prescription_read_id' => $prescription->id,
        ]);

        return response()->json([
            'message' => 'Report added successfully',
            'success' => true,
            'report' => $report,
        ]);
    }
}
