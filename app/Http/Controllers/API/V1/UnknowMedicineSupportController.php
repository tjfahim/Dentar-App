<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\UnknownMedicine;
use App\Models\UnknownMedicineReport;
use App\Http\Resources\UnknownMedicineResource;
use App\Models\Doctor;
use App\Jobs\SendNotificationQueue;

class UnknowMedicineSupportController extends Controller
{
    
    public function index()
    {


        $user = Auth::user();

        $with_report = [];
        $without_report = [];

        if($user->userType == 'doctor'){
            $unknownM = UnknownMedicine::with(['report.doctor'])->get();


            foreach($unknownM as $case){
                if(count($case['report'])) {
                    $with_report[] = $case;
                    continue;
                }
                $without_report[] = $case;
            }
            
            $with_report = array_reverse($with_report);

            return response()->json([
                'message' => "All Prescription Read List",
                'success' => true,
                'data' => [
                    'with_report' => UnknownMedicineResource::collection($with_report),
                    'without_report' => UnknownMedicineResource::collection($without_report),
                ]
            ]);
            // return  UnknownMedicineResource::collection($unknownM);
        }

        $medicine = $user->UnknownMedicineCase->load('report.doctor');



        $medicineCase = $medicine->map(function($item){
            if($item->user_type == 'patient'){
                return $item->load('patient');
            }elseif($item->user_type == 'student'){
                return $item->load('student');
            }
        });


        foreach($medicineCase as $case){
            if(count($case['report'])) {
                $with_report[] = $case;
                continue;
            }
            $without_report[] = $case;
        }
        
        $with_report = array_reverse($with_report);

        return response()->json([
            'message' => "All Unknown medicine  List",
            'success' => true,
            'data' => [
                'with_report' => UnknownMedicineResource::collection($with_report),
                'without_report' => UnknownMedicineResource::collection($without_report),
            ]
        ]);



       // return  UnknownMedicineResource::collection($medicineCase);

    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'file' => 'nullable|string',
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        if($request->file){
            $files = explode(',', $request->file);
        }else{
            $files = '';
        }



        $case = UnknownMedicine::create([
            'title' => $request->title,
            'description' => $request->description,
            'files' =>  $files = json_encode($files),
            'user_id' => Auth::id(),
            'user_type' => Auth::user()->userType,
        ]);
        
        
        $title = 'UnknownMedicine Check';
        $body = $request->title;

        $doctors = Doctor::all();

        foreach ($doctors as $doctor){
            SendNotificationQueue::dispatch($title, $body, $doctor)->onConnection('database');
        }

        return response()->json([
            'message' => 'add successfully',
            'success' => true,
            'case' => $case
        ]);
    }

    public function addReport(Request $request, $id)
    {

        $med = UnknownMedicine::where('id', $id)->first();
        

        if(!$med){
            return response()->json([
                'errors' => 'Case not found'
            ], 404);
        }
        
       
        
         switch ($med->user_type) {
            case 'patient':
                $user = $med->patient;

                break;
            case'student':
                $user = $med->student;
                break;
            case'doctor':
                $user = $med->doctor;
                break;

        }

        

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'file' => 'nullable|string',
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        if($request->file){
            $files = explode(',', $request->file);
        }else{
            $files = '';
        }


        $case = UnknownMedicineReport::create([
            'title' => $request->title,
            'description' => $request->description,
            'files' =>  $files = json_encode($files),
            'doctor_id' => Auth::id(),
            'unkown_medicine_id' => $med->id,
         ]);
         
         
        $title = 'UnknownMedicine Report';
        $body = $med->title;

        SendNotificationQueue::dispatch($title, $body, $user)->onConnection('database');

        return response()->json([
            'message' => 'add successfully',
            'success' => true,
            'case' => $case
        ]);
    }
}
