<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Doctor;
use App\Models\DoctorSpecialty;
use App\Models\Hospital;
use App\Models\QuizManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Jobs\SendNotificationQueue;
use App\Traits\PushNotification;

class QuizManageController extends Controller
{
    use PushNotification;

    public function filterUserData(Request $request)
    {
        $query = Doctor::query();

        if ($request->district_id) {
            $query->where('address', $request->district_id);
        }

        if ($request->specialization_id) {
            $query->where('specialization', $request->specialization_id);
        }

        if ($request->hospital_id) {
            $query->where('organization', $request->hospital_id);
        }

        $doctors = $query->get();

        return view('admin.pages.quiz_manages.tableRow', compact('doctors'))->render();
    }
   
    public function index()
    {
        $records = QuizManage::orderBy('id', 'DESC')->get();
        return view('admin.pages.quiz_manages.index', compact('records'));
    }

    public function create()
    {
        return view('admin.pages.quiz_manages.create'); // Pass modules to the view
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $request->end_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->end_time , 'Asia/Dhaka');
        
         $request->start_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->start_time , 'Asia/Dhaka');
         
        $input = $request->all();
        QuizManage::create($input);

        return redirect()->route('quizManage.index')->with('success', 'Quiz added successfully.');
    }

    public function edit($id)
    {
        $record = QuizManage::findOrFail($id);
        return view('admin.pages.quiz_manages.edit', compact('record')); // Pass record and modules to the view
    }

    public function update(Request $request, $id)
    {
        
        $record = QuizManage::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        
        
        $request->end_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->end_time , 'Asia/Dhaka');
        
         $request->start_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->start_time , 'Asia/Dhaka');
        

        $input = $request->all();
        $record->update($input);

        return redirect()->route('quizManage.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy($id)
    {
        $record = QuizManage::findOrFail($id);
        $record->delete();
        return redirect()->route('quizManage.index')->with('success', 'Quiz deleted successfully.');
    }
    
    
    public function leaderboard()
    {
        
        $attributes = request()->validate([
            'quiz_manage_id' => 'required'
        ]);
        
        // Set all quizzes to 'inactive'
        QuizManage::query()->update(['leaderboard' => 'inactive']);
        
        // Find the selected quiz and set it to 'active'
        if($attributes['quiz_manage_id'] !== 'none'){
            $quiz = QuizManage::findOrFail($attributes['quiz_manage_id']);
            $quiz->leaderboard = 'active';
            $quiz->save();
        }
        
        // Optionally, return something or redirect
        return redirect()->route('quizManage.index')->with('success', 'Leaderboard updated successfully!');
    }

     public function createWithUser()
    {
        $doctors = Doctor::latest()->get();
        $districts = District::all();
        $specializations = DoctorSpecialty::all();
        $hospitals = Hospital::all();
        return view('admin.pages.quiz_manages.createWithUser', [
            'doctors' => $doctors,
            'districts' => $districts,
            'specializations' => $specializations,
            'hospitals' => $hospitals

        ]); // Pass modules to the view
    }

    public function editWithUser($id)
    {
        $quiz = QuizManage::findOrFail($id);

       $doctors = Doctor::all();
        $districts = District::all();
         $specializations = DoctorSpecialty::all();
        $hospitals = Hospital::all();

        // return $quiz;

        // $selectedDoctorIds = $quiz->doctors()->pluck('doctors.id')->toArray();
        return view('admin.pages.quiz_manages.editWithUser', [
            'quiz' => $quiz,
            'doctors' => $doctors,
            'districts' => $districts,
            'specializations' => $specializations,
            'hospitals' => $hospitals,
            // 'selectedDoctorIds' => $selectedDoctorIds
        ]); 
    }

   

    public function indexWithUser()
    {
        $records = QuizManage::orderBy('id', 'DESC')->get();
        

        return view('admin.pages.quiz_manages.indexWithUser', [
            'records' => $records,
        ]);
    }


    public function storewithuser(Request $request)
    {
        // return response()->json([
        //     'message' => request()->all(),
        // ]);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'start_time' => 'required',
            'end_time' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'doctor_ids' => 'required|array'
        ]);

       if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $request->end_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->end_time , 'Asia/Dhaka');
        
        $request->start_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->start_time , 'Asia/Dhaka');

        
        $input = $request->all();
        $users = $input['doctor_ids'];
        $input['user'] = json_encode($input['doctor_ids']);
        unset($input['doctor_ids']);
        $quiz = QuizManage::create($input);
        
        
         $title = 'New Quiz';
        $body = 'Quiz Start ' . $request->start_time->format('d M Y, h:i A'); 
        $data = [
            'preload' => "quiz"
        ];

        // SendNotificationQueue::dispatch($title, $body, $doctor_id)->onConnection('database');
        
        foreach($users as $id){
            $user = Doctor::find($id);
            
            SendNotificationQueue::dispatch($title, $body, $user, $data)->onConnection('database');
        }
        
        
        return response()->json([
            'success' => $quiz
        ]);
        return redirect()->route('quizManage.index')->with('success', 'Quiz added successfully.');
    }

     public function editWithUserUpdate(Request $request,$id)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'start_time' => 'required',
            'end_time' => 'required',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'doctor_ids' => 'required|array'
        ]);

       if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $request->end_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->end_time , 'Asia/Dhaka');
        
        $request->start_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->start_time , 'Asia/Dhaka');

        
        $input = $request->all();
        $users = $input['doctor_ids'];
        $input['user'] = json_encode($input['doctor_ids']);
        unset($input['doctor_ids']);
        $quiz = QuizManage::findOrFail($id);
        $quiz->name = $request->name;
        $quiz->start_time = $request->start_time;
        $quiz->end_time = $request->end_time;
        $quiz->description = $request->description;
        $quiz->status = $request->status;
        $quiz->user = $request->doctor_ids;
        $quiz->save();
        
        
        $title = ' Quiz Update';
        $body = 'Quiz Start ' . $request->start_time->format('d M Y, h:i A'); 
        $data = [
            'preload' => "quiz"
        ];

        // SendNotificationQueue::dispatch($title, $body, $doctor_id)->onConnection('database');
        
        foreach($users as $id){
            $user = Doctor::find($id);
            
            SendNotificationQueue::dispatch($title, $body, $user, $data)->onConnection('database');
        }
    
        return response()->json([
            'message' => 'success',
            'data' => $quiz
        ]);
    }
}
