<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ForgetPasswordController extends Controller
{
    public function passwordForgetUser(Request $request)
    {
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
        }
        
        if($user){
            return response()->json([
                'status' => 'success',
            ]);
        }
        
    }
    
    public function newpasswordset(Request $request)
    {
        
        $attributes = $request->validate([
            'password' => 'required|confirmed',
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
        }
        
        $password = Hash::make($attributes['password']);
        
        $user->password = $password;
        $user->save();
        
        
        if($user){
            return response()->json([
                'status' => 'success',
                'message' => 'password change successfully'
            ]);
        }
        
        
        
    }
}
