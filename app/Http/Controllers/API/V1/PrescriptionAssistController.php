<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrescriptionAssistResource;
use App\Jobs\SendNotificationQueue;
use App\Models\Doctor;
use App\Models\Notification;
use App\Models\PrescriptionAssist;
use App\Models\PrescriptionAssistReplay;
use App\Traits\PushNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PrescriptionAssistController extends Controller
{
    use PushNotification;
    public function index()
    {

        $user = Auth::user();


        switch($user->userType){
            case 'student':
                $prescriptions = $user->prescriptions()->get();
                break;
            case 'patient':
                $prescriptions = $user->prescriptions()->get();
                break;
            case 'doctor' :
                $prescriptions = PrescriptionAssist::get();
                break;
        }


        foreach($prescriptions as $prescription){
                $prescription->load('reports');

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

        foreach($prescriptions as $prescription){
            foreach($prescription->reports as $report){
                $report->load('doctor');
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string',
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $files = explode(',', $request->image);


        // if ($request->hasFile('image')) {

        //     $fileName = time() . '.' . $request->image->extension();

        //     $request->image->move(public_path('images/prescriptions/'), $fileName);

        //     $imagePath = 'images/prescriptions/' . $fileName;
        // }

        $user = Auth::user();

        $prescription = PrescriptionAssist::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => json_encode($files) ?? '',
            'user_id' => $user->id,
            'userType' => $user->userType,
        ]);


        // notification system
        $title = 'Prescriptions Assists';
        $body = $request->title;

        $doctors = Doctor::all();

        foreach ($doctors as $doctor){
            SendNotificationQueue::dispatch($title, $body, $doctor)->onConnection('database');
        }

        // foreach ($doctors as $doctor) {
        //     $notification = Notification::create([
        //         'title' => $title,
        //         'body' => $body,
        //         'user_id' => $doctor->id,
        //         'user_type' => $doctor->userType
        //     ]);
        //     $this->sendNotification($doctor->token, $title, $body);
        // }




        return response()->json([
            'message' => 'Prescription Assist create successfully!',
            'prescriptionAssist' => new PrescriptionAssistResource($prescription)
        ], 200);

    }



    public function replayAssist(Request $request, $id)
    {
        $prescription = PrescriptionAssist::find($id);

        switch ($prescription->userType) {
            case 'patient':
                $user = $prescription->patient;

                break;
            case'student':
                $user = $prescription->student;
                break;
            case'doctor':
                $user = $prescription->doctor;
                break;

        }

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


        // notification system
        $title = 'Prescriptions Assist Report';
        $body = $prescription->title;

        SendNotificationQueue::dispatch($title, $body, $user)->onConnection('database');

        // $notification = Notification::create([
        //     'title' => $title,
        //     'body' => $body,
        //     'user_id' => $user->id,
        //     'user_type' => $user->userType
        // ]);
        // $this->sendNotification($user->token, $title, $body);


        if($replay){
            return response()->json([
                'message' => "Prescription assist replay successfully",
                'success' => true,
                'data' => $replay
            ]);
        }

    }

}
