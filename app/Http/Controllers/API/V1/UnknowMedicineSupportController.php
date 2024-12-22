<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\UnknownMedicine;
use App\Models\UnknownMedicineReport;
use App\Http\Resources\UnknownMedicineResource;

class UnknowMedicineSupportController extends Controller
{
    public function index()
    {


        $user = Auth::user();

        if($user->userType == 'doctor'){
            $unknownM = UnknownMedicine::with(['report.doctor'])->latest()->get();
            return  UnknownMedicineResource::collection($unknownM);
        }

        $medicine = $user->UnknownMedicineCase->load('report.doctor');



        $medicineCase = $medicine->map(function($item){
            if($item->user_type == 'patient'){
                return $item->load('patient');
            }elseif($item->user_type == 'student'){
                return $item->load('student');
            }
        });



        return  UnknownMedicineResource::collection($medicineCase);

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
        ]);

        return response()->json([
            'message' => 'add successfully',
            'success' => true,
            'case' => $case
        ]);
    }

    public function addReport(Request $request, $id)
    {

        $med = UnknownMedicine::find($id)->first();

        if(!$med){
            return response()->json([
                'errors' => 'Case not found'
            ], 404);
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

        return response()->json([
            'message' => 'add successfully',
            'success' => true,
            'case' => $case
        ]);
    }
}
