<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\AuthApi;
use App\Http\Controllers\API\V1\AntibioticGuideController;
use App\Http\Controllers\API\V1\Auth\LoginController;
use App\Http\Controllers\API\V1\Auth\ForgetPasswordController;
use App\Http\Controllers\API\V1\Auth\ProfileController;
use App\Http\Controllers\API\V1\Auth\RegisterController;
use App\Http\Controllers\API\V1\Auth\StudentController;
use App\Http\Controllers\API\V1\Auth\UserController;
use App\Http\Controllers\API\V1\BlogController;
use Illuminate\Support\Facades\Route;

use App\Models\LiveNews;
use App\Models\QuizResult;

use Illuminate\Support\Facades\Broadcast;

use App\Http\Controllers\API\V1\BookController;
use App\Http\Controllers\API\V1\QuizResultController;
use App\Http\Controllers\API\V1\ContactController;
use App\Http\Controllers\API\V1\DiognosticController;
use App\Http\Controllers\API\V1\EmergencyHelpGuideController;
use App\Http\Controllers\API\V1\JobController;
use App\Http\Controllers\API\V1\Patinet\PatientProblemController;
use App\Http\Controllers\API\V1\SliderController;
use App\Http\Controllers\API\V1\Doctor\DoctorController;
use App\Http\Controllers\API\V1\FeedbackController;
use App\Http\Controllers\API\V1\FileStoregeController;
use App\Http\Controllers\API\V1\MessageManageApi;
use App\Http\Controllers\API\V1\NationalGuideLineController;
use App\Http\Controllers\API\V1\NotificationController;
use App\Http\Controllers\API\V1\PrescriptionAssistController;
use App\Http\Controllers\API\V1\PrescriptionReadController;
use App\Http\Controllers\API\V1\QuizQuestionManageApi;
use App\Http\Controllers\API\V1\TeenagerHelpController;
use App\Http\Controllers\API\V1\UnknowMedicineSupportController;
use App\Http\Controllers\DiagnosticController;

use App\Http\Controllers\VideoController;
use App\Http\Resources\DoctorSpecialtyResource;
use App\Models\District;
use App\Models\DoctorSpecialty;
use App\Models\Hospital;
use App\Models\NationalGuideLine;
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
    Route::post('update-notification-update', [AuthApi::class, 'updateNotification']);

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

Route::post('forgetpassworduser', [ForgetPasswordController::class, 'passwordForgetUser']);
Route::post('newpasswordset', [ForgetPasswordController::class, 'newpasswordset']);


Route::get('accountdelete/', [ProfileController::class, 'accountdelete']);
Route::post('accountdeletesubmit/', [ProfileController::class, 'accountDeleteSubmit'])->name('accountdeletesubmit');


Route::get('districts', function(){
    $districts = District::select('id', 'name', 'name_bn')->get();
    
    $districts->map(fn($item)=> $item->append('full_name'));
    // $districts->makeHidden(['name']);
    // return $districts->modelKeys();
    return response()->json([
        'message' => 'All district list',
        'data' => $districts,
    ]); 
});

Route::get('hospitals', function(){
    return response()->json([
        'message' => 'All Hospital list',
        'data' => Hospital::select('id', 'name')->get(),
    ]); 
});

Route::get('doctor-specialty', function(){
    $allSpecialty = DoctorSpecialty::all();
    return response()->json([
        'message' => 'Specialty list',
        'data' => $allSpecialty
    ]); 
});


// Route::post('verify-otp', [RegisterController::class, 'verifyOtp']);
// Route::post('send-otp', [RegisterController::class, 'sendOtp']);
// Route::post('check-otp', [RegisterController::class, 'checkOtp']);

Route::post('password/forget', [AuthApi::class, 'sendOtp']);
Route::post('otp/verify', [AuthApi::class, 'checkOtp']);
Route::post('password/reset', [AuthApi::class, 'resetPassword']);

Route::get('delete-profile/{id}', [ProfileController::class, 'profileDelete']);
Route::get('delete-user-profile/', [ProfileController::class, 'profileDeleteforall']);


Route::middleware('auth:sanctum')->group(function(){
    
    
    Route::get('getQuiz', [ QuizQuestionManageApi::class, 'getQuiz']);
    Route::get('job', [JobController::class, 'index']);
    Route::post('job/show/{id}', [JobController::class, 'show']);
    Route::post('job/add', [JobController::class, 'store']);
    Route::post('job/update/{id}', [JobController::class, 'update']);
    Route::post('job/delete/{id}', [JobController::class, 'destroy']);
    Route::post('job/search', [JobController::class, 'search']);

    Route::post('send-message', [MessageManageApi::class, 'sendMessage']);
    Route::get('conversation-list', [MessageManageApi::class, 'conversationList']);
    Route::get('searchConversationList', [MessageManageApi::class, 'searchConversationList']);
    Route::get('get-messages', [MessageManageApi::class, 'getMessages']);

    Route::get('notification', [NotificationController::class, 'index']);
    Route::get('notification/read/{id}', [NotificationController::class, 'read']);

    Route::get('profile', [ProfileController::class, 'profile']);
        Route::post('profile/notification/update', [ProfileController::class, 'updateProfilenotification']);
        Route::post('notification/update/read', [NotificationController::class, 'updatenotification']);

    Route::get('delete-user-profile/', [ProfileController::class, 'profileDeleteforall']);

    

    // device tokens
    Route::post('devicetoken', [ProfileController::class, 'deviceToken']);
    Route::post('profile/update', [ProfileController::class, 'updateProfile']);

    Route::post('password/change', [AuthApi::class, 'passwordUpdate']);


    Route::post('feedback/add', [FeedbackController::class, 'store']);
    Route::post('contacts', [ContactController::class, 'store']);
    Route::get('youtube/videos', [VideoController::class, 'index']);
    Route::get('doctors/lists', [DoctorController::class, 'doctor_list']);
    // Route::get('doctors/lists/blog', [DoctorController::class, 'blogDoctorList']);

    Route::get('prescription/lists', [PrescriptionAssistController::class, 'index']);
    Route::post('prescription/add', [PrescriptionAssistController::class, 'store']);


    Route::get('diagnostic', [DiognosticController::class, 'index']);
    Route::post('diagnostic/add', [DiognosticController::class, 'add']);
    
    

    Route::get('unknown/medicine', [UnknowMedicineSupportController::class, 'index']);
    Route::post('unknown/medicine', [UnknowMedicineSupportController::class, 'store']);
    Route::post('unknown/medicine/report/{id}', [UnknowMedicineSupportController::class, 'addReport']);


    Route::get('prescription/read', [PrescriptionReadController::class, 'index']);
    Route::post('prescription/read', [PrescriptionReadController::class, 'store']);
    Route::post('prescription/read/report/{id}', [PrescriptionReadController::class, 'addReport']);


    Route::post('blog/add', [BlogController::class, 'store']);
    Route::post('blog/update/{id}', [BlogController::class, 'update']);
    Route::delete('blog/delete/{id}', [BlogController::class, 'destroy']);

    Route::post('blog/comment/{id}', [BlogController::class, 'addComment']);
    Route::post('blog/comment/update/{id}', [BlogController::class, 'updateComment']);
    Route::post('blog/comment/delete/{id}', [BlogController::class, 'commentDelete']);
    Route::post('blog/comment/{b_id}/replay/{c_id}', [BlogController::class, 'replayComment']);

});


// blog api
Route::get('blog/lists', [BlogController::class, 'index']);
Route::get('blog/show/{id}', [BlogController::class, 'show']);

Route::get('national/guideline', [NationalGuideLineController::class, 'index']);
Route::get('antibiotic/guideline', AntibioticGuideController::class);
Route::get('teenager/help', [TeenagerHelpController::class, 'index']);


// doctor and student  common section
Route::middleware(['auth:sanctum', 'auth.doctor_or_student'])->group(function(){
   


    Route::get('book', [BookController::class, 'index']);
    Route::get('pdf', [BookController::class, 'pdf_index']);
    Route::post('book/search', [BookController::class, 'search'])
        ->name('search');



    Route::post('submitquiz', [ QuizQuestionManageApi::class, 'submitquiz']);

});




// doctor section
Route::middleware(['auth:sanctum', 'auth.doctor'])->group(function(){
    //Route::get('/doctor/patient/list', [DoctorController::class, 'caseList']);


    Route::post('/doctor/patient/report/{id}', [DoctorController::class, 'addReport']);


    Route::post('prescription/replay/{id}', [PrescriptionAssistController::class, 'replayAssist']);
    Route::post('diagnostic/report/{id}', [DiognosticController::class, 'report']);
    Route::get('diagnostic/collect/{id}', [DiognosticController::class, 'collect']);
});


// patient section only
Route::middleware('auth:sanctum', 'auth.patient')->group(function(){
    //Route::get('/patient/cases/list', [PatientProblemController::class, 'problemList']);
    Route::post('/patient/cases/add', [PatientProblemController::class, 'store']);
});


// common api
Route::get('emergency/guide', [EmergencyHelpGuideController::class, 'index']);

Route::get('privacy/policy', function(){
    return PrivacyPolicy::first();
});

Route::get('privacypolicy', function(){
    return response()->json([
        'message' => "privacy policy",
        'url' =>  route('privacy-policy')
    ]);
});
Route::get('trumsandcondition', function(){
return PrivacyPolicy::find(2);

    return response()->json([
        'title' => "Lorem task",
        'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text"
    ]);
});




Route::get('lists', function(){
    return response()->json([
        'doctor-specialty' => DoctorSpecialty::pluck('name')->all(),
        'organization' => Hospital::pluck('name')->all(), // Returns just hospital names
        'occupation' => ['doctor', 'student', 'patient'],
        'bmdc_type' => ['Doctor', 'Dentor']
    ]);
});

Route::get('doctor/specialty-list', function(){
    return response()->json([
        'message' => 'doctor specialty lists',
        'data' => DoctorSpecialty::select('id', 'name')->get(),
    ]);
});


Route::get('leaderboard', [QuizResultController::class, 'index']);


Route::get('announcement ', function(){
    $news_all = LiveNews::where('status', 'active')->latest()->pluck('news');;
    
    
    $gap = str_repeat('  |  ', 1 );

    $str = '';
    
    foreach ($news_all as $news) {
        $str .= $news . $gap;
    }
    
    
    
    return response()->json([
        'status' => 'success',
        'data' => $str
    ]);
});


Route::apiResource('sliders', SliderController::class)
    ->only('index');


Route::get('/test', function(){
    $user = Auth::user();
    return $user;
})->middleware('auth:sanctum');


Route::post('store', FileStoregeController::class);

Route::get('send-notification', function(){
   return 1; 
});
// h



Route::get('testpdf', function(){
    // dd(file_exists(public_path('fonts/SolaimanLipi.ttf')));
    // return public_path()."/fonts";
    $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir'];

    $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];

    $mpdf = new \Mpdf\Mpdf([
        'fontDir' => array_merge($fontDirs, [
            public_path()."/fonts",
        ]),
        'fontdata' => $fontData + [ // lowercase letters only in font key
            'solaimanlipi' => [
                'R' => 'SolaimanLipi.ttf',
                'I' => 'SolaimanLipi.ttf',
                'useOTL' => 0xFF,
                'useKashida' => 75,
            ]
        ],
        'default_font' => 'solaimanlipi'
    ]);

    $mpdf->WriteHTML(view('pdfview/mpdf'));
    $mpdf->Output('test.pdf', 'I');

});