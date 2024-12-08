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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            // 'phone' => 'required_without:email|string|max:15', // If phone is provided, email is not required
            // 'email' => 'required_without:phone|email', // If email is provided, phone is not required

            'password' => 'required|string',
        ]);

        if(!$request->user){
            return response()->json([
                'error' => [
                    'user' => [
                        "Please add phone or email address"
                    ]
                ]
            ], 422);
        }

        $email = null;
        $phone = null;


        $email = filter_var($request->user , FILTER_VALIDATE_EMAIL);
        if(!$email){
            $phone = $request->user;
        }

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = null;
        $userType = null;

        if($phone){
            $user  = Patient::where('phone',$phone )->first();
            $userType = 'patient';
        }elseif($email){
            $user =  Patient::where('email', $email )->first();
            $userType = 'patient';
        }

        if(!$user){
            if($phone){
                $user  = Student::where('phone',$phone )->first();
                $userType = 'student';
            }elseif($email){
                $user =  Student::where('email', $email )->first();
                $userType = 'student';
            }
        }

        if(!$user){
            if($phone){
                $user  = Doctor::where('phone',$phone )->first();
                $userType = 'doctor';
            }elseif($email){
                $user =  Doctor::where('email', $email )->first();
                $userType = 'doctor';
            }
        }

        if(!$user){
            if($email){
                return response()->json(['error' => 'Incorrect email'], 401);
            }elseif($phone){
                return response()->json(['error' => 'Incorrect phone number'], 401);

            }
        }elseif(!Hash::check($request->password, $user->password)){
            return response()->json(['error' => 'Incorrect password'], 401);
        }


        $token = $user->createToken('auth_token')->plainTextToken;
        if($userType == 'doctor'){
            $userRes = new UserResource($user);
        }elseif($userType == 'student'){
            $userRes = new UserResource($user);
        }elseif($userType == 'patient'){
            $userRes = new UserResource($user);
        }

        // Return the token in the response
        return response()->json([
            'message' => 'Login successful',
            'userType' => $userType,
            'token' => $token,
            'user' => $userRes
        ]);
    }


    public function logout(Request $request)
{
    // Ensure the user is authenticated
    if (!$request->user()) {
        return response()->json(['error' => 'User not authenticated'], 401);
    }

    // Revoke the current access token
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'Logout successful'
    ], 200);
}

}
