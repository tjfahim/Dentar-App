<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\AuthApi;
use App\Http\Controllers\API\V1\Auth\LoginController;
use App\Http\Controllers\API\V1\Auth\ProfileController;
use App\Http\Controllers\API\V1\Auth\RegisterController;
use App\Http\Controllers\API\V1\Auth\StudentController;
use App\Http\Controllers\API\V1\Auth\UserController;
use App\Http\Controllers\API\V1\BlogController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Broadcast;

use App\Http\Controllers\API\V1\BookController;
use App\Http\Controllers\API\V1\ContactController;
use App\Http\Controllers\API\V1\JobController;
use App\Http\Controllers\API\V1\Patinet\PatientProblemController;
use App\Http\Controllers\API\V1\SliderController;
use App\Http\Controllers\API\V1\Doctor\DoctorController;
use App\Http\Controllers\API\V1\NotificationController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\VideoController;
use App\Http\Resources\DoctorSpecialtyResource;
use App\Models\DoctorSpecialty;
use App\Models\PrivacyPolicy;
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
Route::post('logout', [ LoginController::class, 'logout'])->middleware('auth:sanctum');
Route::post('register', RegisterController::class);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('profile', [ProfileController::class, 'profile']);
    Route::post('profile/update', [ProfileController::class, 'updateProfile']);

    Route::post('feedback/add', [FeedbackController::class, 'store']);
    Route::post('contact/add', [ContactController::class, 'store']);
    Route::get('youtube/videos', [VideoController::class, 'index']);
});



// blog api
Route::get('blog/lists', [BlogController::class, 'index']);
Route::get('blog/show/{id}', [BlogController::class, 'show']);




// doctor and student  common section
Route::middleware(['auth:sanctum', 'auth.doctor_or_student'])->group(function(){
    Route::get('job', [JobController::class, 'index'])->name('job.index');
    Route::get('job/{job}', [JobController::class, 'show'])->name('job.show');
    Route::post('job/search', [JobController::class, 'search'])->name('job.search');


    Route::get('book', [BookController::class, 'index']);
    Route::get('pdf', [BookController::class, 'pdf_index']);
    Route::post('book/search', [BookController::class, 'search'])
        ->name('search');


    Route::post('blog/add', [BlogController::class, 'store']);
    Route::post('blog/update', [BlogController::class, 'update']);
    Route::get('blog/delete', [BlogController::class, 'destroy']);
});




// doctor section
Route::middleware(['auth:sanctum', 'auth.doctor'])->group(function(){
    Route::get('/doctor/patient/list', [DoctorController::class, 'caseList']);
    Route::post('/doctor/patient/report/{id}', [DoctorController::class, 'addReport']);
});


// patient section only
Route::middleware('auth:sanctum', 'auth.patient')->group(function(){
    Route::get('/patient/cases/list', [PatientProblemController::class, 'problemList'])->middleware('auth:sanctum');
    Route::post('/patient/cases/add', [PatientProblemController::class, 'store'])->middleware('auth:sanctum');
});


// common api

Route::get('notification', [NotificationController::class, 'index']);
Route::get('privacypolicy', function(){
    return PrivacyPolicy::first();
});
Route::get('trumsandcondition', function(){
    return response()->json([
        'title' => "Lorem task",
        'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text"
    ]);
});







Route::get('lists', function(){
    $allSpecialty = DoctorSpecialty::all();
    $arr = [];

    foreach($allSpecialty as $item){
       array_push($arr, $item->name);
    }

    return response()->json([
        'doctor-specialty' => $arr,
        'organization' => ['HealthCare Center', 'Clinic Center', 'Diagnostic'],
        'occupation' => ['doctor', 'student', 'patient'],
        'bmdc_type' => ['Doctor', 'Dentor']
    ]);
});




Route::get('leaderboard', function () {
    return response()->json([
        [
            'name' => 'John Doe',
            'score' => 1500,
            'image' => 'https://via.placeholder.com/150',
        ],
        [
            'name' => 'Jane Smith',
            'score' => 1400,
            'image' => 'https://via.placeholder.com/150',
        ],
        [
            'name' => 'Alice Johnson',
            'score' => 1350,
            'image' => 'https://via.placeholder.com/150',
        ],
        [
            'name' => 'Bob Brown',
            'score' => 1300,
            'image' => 'https://via.placeholder.com/150',
        ],
    ]);
});




Route::apiResource('sliders', SliderController::class)
    ->only('index');


Route::get('/test', function(){
    $user = Auth::user();
    return $user;
})->middleware('auth:sanctum');
// h
