<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\UserResource;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required_without:email|string|max:15', // If phone is provided, email is not required
            'email' => 'required_without:phone|email', // If email is provided, phone is not required
            'password' => 'required|string',
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = null;
        $userType = null;

        if($request->has('phone')){
            $user  = Patient::where('phone', $request->phone )->first();
            $userType = 'patient';
        }elseif($request->has('email')){
            $user =  Patient::where('email', $request->email )->first();
            $userType = 'patient';
        }

        if(!$user){
            if($request->has('phone')){
                $user  = Student::where('phone', $request->phone )->first();
                $userType = 'student';
            }elseif($request->has('email')){
                $user =  Student::where('email', $request->email )->first();
                $userType = 'student';
            }
        }

        if(!$user){
            if($request->has('phone')){
                $user  = Doctor::where('phone', $request->phone )->first();
                $userType = 'doctor';
            }elseif($request->has('email')){
                $user =  Doctor::where('email', $request->email )->first();
                $userType = 'doctor';
            }
        }



        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['error' => 'Invalid credentials'], 401);
        }


        $token = $user->createToken('auth_token')->plainTextToken;
        if($userType == 'doctor'){
            $userRes = new DoctorResource($user);
        }elseif($userType == 'student'){
            $userRes = new StudentResource($user);
        }elseif($userType == 'patient'){
            $userRes = new UserResource($user);
        }

        // Return the token in the response
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $userRes
        ]);
    }
}
