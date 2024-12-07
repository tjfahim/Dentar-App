<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\AuthApi;
use App\Http\Controllers\API\V1\Auth\LoginController;
use App\Http\Controllers\API\V1\Auth\RegisterController;
use App\Http\Controllers\API\V1\Auth\StudentController;
use App\Http\Controllers\API\V1\Auth\UserController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Broadcast;

use App\Http\Controllers\API\V1\BookController;
use App\Http\Controllers\API\V1\JobController;
use App\Http\Controllers\API\V1\Patinet\PatientProblemController;
use App\Http\Controllers\API\V1\SliderController;
use App\Http\Controllers\API\V1\Doctor\DoctorController;
use App\Http\Resources\DoctorSpecialtyResource;
use App\Models\DoctorSpecialty;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// roopi api
// Route::post('login', [AuthApi::class, 'login']);
// Route::post('register', [AuthApi::class, 'register']);

// Route::post('send-otp', [AuthApi::class, 'sendOtp']);
// Route::post('check-otp', [AuthApi::class, 'checkOtp']);
// Route::post('reset-password', [AuthApi::class, 'resetPassword']);



Route::group(['middleware'=>'jwt_auth'], function($router){

Route::post('/broadcasting/auth', function (Request $request) {
    Log::info('Channel  attempt:', [
                'call' => 'yes'
            ]);
        return Broadcast::auth($request);

    return response()->json(['error' => 'Unauthorized'], 403);
}); // Add auth middleware to this route

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // roopi api
    Route::get('/user-info', [AuthApi::class, 'userInfo']);
    Route::post('profile-update', [AuthApi::class, 'update']);
    Route::delete('profile-delete', [AuthApi::class, 'profileDelete']);
    Route::put('change-password', [AuthApi::class, 'passwordUpdate']);

    Route::post('user-is-active', [AuthApi::class, 'userIsActive']);
    Route::get('get-active-users', [AuthApi::class, 'getActiveUsers']);


});

Route::post('hash-password', function(Request $request){
    return Hash::make($request->password);
});


// h
// auth --user
Route::post('login', [ LoginController::class, 'login']);
Route::post('register', RegisterController::class);


// Route::post('user/login', [UserController::class, 'login'])->middleware('api_role');
// Route::post('user/register', [UserController::class, 'register'])->name('patient.register');
// Route::get('user/{id}', [UserController::class, 'destroy']);

// // auth --student
// Route::post('student/login', [StudentController::class, 'login']);
// Route::post('student/register', [StudentController::class, 'register'])->name('student.register');
// Route::get('student/{id}', [StudentController::class, 'destroy']);

// // auth --doctor
// Route::post('doctor/login', [DoctorController::class, 'login']);
// Route::post('doctor/register', [DoctorController::class, 'register'])->name('doctor.register');
// Route::get('doctor/{id}', [DoctorController::class, 'destroy']);

// Route::apiResource('job', JobController::class)
//     ->only('index');

Route::middleware(['auth:sanctum', 'auth.student'])->group(function(){
    Route::get('job', [JobController::class, 'index'])->name('job.index');
    Route::get('job/{job}', [JobController::class, 'show'])->name('job.show');
    Route::post('job/search', [JobController::class, 'search'])->name('job.search');


    Route::apiResource('book', BookController::class);
    Route::post('book/search', [BookController::class, 'search'])
        ->name('search');
});

Route::middleware(['auth:sanctum', 'auth.doctor'])->group(function(){
    Route::get('/doctor/patient/list', [DoctorController::class, 'caseList']);
    Route::get('/doctor/patient/add', [DoctorController::class, 'caseList']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/patient/cases/list', [PatientProblemController::class, 'problemList'])->middleware('auth:sanctum');
    Route::post('/patient/cases/add', [PatientProblemController::class, 'store'])->middleware('auth:sanctum');
});






Route::get('lists', function(){
    $allSpecialty = DoctorSpecialty::all();
    $arr = [];

    foreach($allSpecialty as $item){
       array_push($arr, $item->name);
    }

    return response()->json([
        'doctor-specialty' => $arr,
        'organization' => ['HealthCare Center', 'Clinic Center', 'Diagnostic']
    ]);
});



Route::apiResource('sliders', SliderController::class)
    ->only('index');


Route::get('/test', function(){
    $user = Auth::user();
    return $user;
})->middleware('auth:sanctum');
// h
