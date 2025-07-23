<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CustomNotificationController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\GuideLine\ChronicsCareController;
// use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\manage\PrescriptionAssistsController;
use App\Http\Controllers\Admin\manage\PrescriptionReadController;
use App\Http\Controllers\Admin\manage\UnkownMedicineController;
use App\Http\Controllers\Admin\NationalGuideLineController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AppSettingManageController;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\File;

use App\Http\Controllers\Admin\GuideLine\AntibioticGuidelineController;
use App\Http\Controllers\Admin\GuideLine\KidneyGuideController;
use App\Http\Controllers\Admin\GuideLine\FemaleHealthController;
use App\Http\Controllers\Admin\GuideLine\FemaleMotherController;
use App\Http\Controllers\Admin\GuideLine\TeenagerHelpsController;
use App\Http\Controllers\Admin\GuideLine\DiabeticGuidesController;
use App\Http\Controllers\Admin\GuideLine\HeartGuidesController;
use App\Http\Controllers\Admin\Guideline\HepaticGuidesController;
use App\Http\Controllers\Admin\Guideline\MentelHelthGuidesController;
use App\Http\Controllers\Admin\Guideline\SkineGuidesController;
use App\Http\Controllers\Admin\manage\DoctorsController;
use App\Http\Controllers\Admin\manage\PatientsController;
use App\Http\Controllers\Admin\manage\StudentsController;
use App\Http\Controllers\Admin\manage\DiognosticManageController;
use App\Http\Controllers\Admin\SettingsController;

use App\Http\Controllers\Admin\Master\AddressController;
use App\Http\Controllers\Admin\Master\SpecializationController;
use App\Http\Controllers\Admin\Master\HospitalController;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SettingsControler;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\QuizManageController;
use App\Http\Controllers\QuizQuestionManageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingManageController;
use App\Models\AppSettingManage;
use App\Models\NationalGuideLine;
use App\Models\PrivacyPolicy;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request; // Ensure that this import is at the top of your file

use Illuminate\Support\Number;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/send-test-email2', function () {
        // Using a view to send the email
        Mail::send('emails.simpleTest', [], function ($message) {
            $message->to('tjfahim1997@gmail.com')
                ->subject('Simple Test Email')
                ->from('info@denterpro.com', 'DenterPro');
        });
    
        return 'Test email sent!';
    });
Route::get('/confirm-login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register.index');
Route::get('/login', function () {
    return view('auth.login');
})->name('login.index');
Route::get('/terms-and-conditions', function () {
    $policy = PrivacyPolicy::where('id', 2)->first(); // Get the first matching record
    return view('terms-and-conditions', ['policy' => $policy]);
});
Route::get('/privacy-policy', function () {
    $policy = PrivacyPolicy::first();

    return view('privacy-policy', ['policy' => $policy]);
})->name('privacy-policy');

// Display Privacy Policy page with edit form
Route::get('/privacy-policy-manage', function () {
    $policy = PrivacyPolicy::first();
    return view('privacy-policy2', ['policy' => $policy]);
})->name('privacy-policy2');


Route::get('/terms-and-conditions-manage', function () {
$terms = PrivacyPolicy::find(2);
    return view('terms-and-conditions2', ['terms' => $terms]);
})->name('terms-and-conditions2');

// Update Terms and Conditions
Route::post('/terms-and-conditions/update', function (Request $request) {
 

    // Find the first TermsAndConditions and update it
$terms = PrivacyPolicy::find(2);
    $terms->title = $request->title;
    $terms->description = $request->description;
    $terms->save();

    // Redirect back to the terms and conditions page with success message
    return redirect()->route('terms-and-conditions2')->with('success', 'Terms and Conditions updated successfully!');
})->name('terms-and-conditions.update');



// Update Privacy Policy
Route::post('/privacy-policy/update', function (Request $request) {
    // Validate input data

    // Find the first PrivacyPolicy and update it
    $policy = PrivacyPolicy::first();
    $policy->title = $request->title;
    $policy->description = $request->description;
    $policy->save();

    // Redirect back to the privacy policy page with updated data
    return redirect()->route('privacy-policy2')->with('success', 'Privacy Policy updated successfully!');
})->name('privacy-policy.update');


Route::post('user-register', [UserController::class, 'store'])->name('userRegister.store');
Route::post('verify-login', [UserController::class, 'verifyLogin'])->name('verifyLogin');

Route::get('/', function () {
    return view('auth.login');
})->name('/');

Route::view('messages/chats', 'admin.message');

Route::middleware(['jwt'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {

        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });


    Route::get('users', [UserController::class, 'index'])->name('usersIndex');
    Route::get('users/create', [UserController::class, 'create'])->name('usersCreate');
    Route::post('users', [UserController::class, 'store'])->name('usersStore');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('usersEdit');
    Route::put('users/{id}', [UserController::class, 'update'])->name('usersUpdate');
    Route::delete('users/delete/{id}', [UserController::class, 'destroy'])->name('usersDestroy');


    Route::get('roles', [RoleController::class, 'index'])->name('role.list');
    Route::get('role', [RoleController::class, 'create'])->name('role.create');
    Route::post('role', [RoleController::class, 'store'])->name('role.store');
    Route::get('role/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('role/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

    Route::resource('settings', SettingsControler::class);
    Route::get('user-settings/{id}', [SettingsControler::class, 'settingsInfo'])->name('user.settings');
    Route::put('user-settings-change-password/{id}', [SettingsControler::class, 'settingsChangeUserPassword'])->name('user.settingsChangeUserPassword');


    Route::resource('settingManage', SettingManageController::class);
    Route::get('/app-settings/edit', [AppSettingManageController::class, 'edit'])->name('appSettingManage.edit');
    Route::put('/app-settings/update', [AppSettingManageController::class, 'update'])->name('appSettingManage.update');


    // h

    Route::resource('manage2/banner', BannerController::class);
    Route::resource('manage2/socialLink', SocialLinkController::class)->only(['index', 'update']);
    Route::resource('manage2/blog_manage', BlogController::class);
    Route::resource('manage2/slider', SliderController::class);
    Route::resource('manage2/book', BookController::class);
    Route::resource('manage2/job', JobController::class);
    Route::resource('manage2/videomanage', VideoController::class);
    // NationalGuideLine
    Route::resource('guideline', NationalGuideLineController::class);
    Route::resource('guide/antibiotic', AntibioticGuidelineController::class);
    Route::resource('guide/kidney', KidneyGuideController::class);
    Route::resource('guide/femalehelth', FemaleHealthController::class);
    Route::resource('guide/mother', FemaleMotherController::class);
    Route::resource('guide/chronic', ChronicsCareController::class);
    Route::resource('guide/teenager', TeenagerHelpsController::class);
    Route::resource('guide/diabetic', DiabeticGuidesController::class);
    Route::resource('guide/heart', HeartGuidesController::class);
    Route::resource('guide/mentelhelth', App\Http\Controllers\Admin\GuideLine\MentelHelthGuidesController::class);
Route::resource('guide/skine', App\Http\Controllers\Admin\GuideLine\SkineGuidesController::class);
Route::resource('guide/hepatic', App\Http\Controllers\Admin\GuideLine\HepaticGuidesController::class);


    // manage all users
    Route::get('manage/doctor/diagnostic', [DoctorsController::class, 'diagnosticDoctor'])->name('doctor.diagnostic');
    Route::resource('manage/doctor', DoctorsController::class);
    Route::resource('manage/student', StudentsController::class);
    Route::resource('manage/patient', PatientsController::class);
    Route::get('manage/diagnostic_case/pending', [ DiognosticManageController::class, 'pending_case'])->name('diagnostic_case.pending');
    Route::get('manage/diagnostic_case/complete', [ DiognosticManageController::class, 'compelete_case'])->name('diagnostic_case.compelete');
    Route::resource('manage/diagnostic_case', DiognosticManageController::class);
    Route::get('manage/prescription_assists/pending', [ PrescriptionAssistsController::class, 'pending_assists'])->name('p_assists.pending');
    Route::get('manage/prescription_assists/complete', [ PrescriptionAssistsController::class, 'complete_assists'])->name('p_assists.complete');
    Route::resource('manage/prescription_assists', PrescriptionAssistsController::class);
    Route::get('manage/prescription_reads/pending', [ PrescriptionReadController::class, 'pending_reads'])->name('p_reads.pending');
    Route::get('manage/prescription_reads/complete', [ PrescriptionReadController::class, 'complete_reads'])->name('p_reads.complete');
    Route::resource('manage/prescription_reads', PrescriptionReadController::class);

    // Route::get('manage/prescription_reads/pending', [ UnkownMedicineController::class, 'pending_reads'])->name('p_reads.pending');
    // Route::get('manage/prescription_reads/complete', [ UnkownMedicineController::class, 'complete_reads'])->name('p_reads.complete');
    Route::resource('manage/prescription_unknown', UnkownMedicineController::class);
    
    Route::resource('manage/announcements', AnnouncementController::class);


    // custome notifications
    Route::resource('manage/notifications_system', CustomNotificationController::class);



    // feedback
    Route::resource('feedback', FeedbackController::class);
    Route::post('/feedback/notification', [FeedbackController::class, 'notification_send'])->name('feedback.notification');

    // contact
    Route::resource('contacts', ContactController::class);
    Route::post('contacts/notification',[ ContactController::class, 'notification_send'])->name('contacts.notification');
    // privaey_plicy
    //Route::resource('privacy',  );
    // videos add,


    Route::resource('setting/general', SettingsController::class)
        ->only('index', 'edit', 'update')
        ->names([
            'index' => 'web.settings.index',
            'edit' => 'web.settings.edit',
            'update' => 'web.settings.update',
    ]);

    // Route::get('site/settings/edit', [SettingsController::class, 'edit']);
    // Route::post('site/settings/{id}', [SettingsController::class, 'update']);
    // h


    Route::get('quizManage-filter-doctor', [ QuizManageController::class,'filterUserData'])->name('quizManage.filter');
    Route::get('quizManage/createwithuser', [ QuizManageController::class,'createWithUser'])->name('quizManage.createwithuser');
    Route::get('quizManage/eidtwithuser/{id}', [ QuizManageController::class,'editWithUser'])->name('quizManage.editWithUser');
    Route::put('quizManage/eidtwithuser/update/{id}', [ QuizManageController::class,'editWithUserUpdate'])->name('quizManage.editWithUserUpdate');
    Route::get('quizManage/quizManage-user', [ QuizManageController::class,'indexWithUser'])->name('quizManage.indexwithuser');
    Route::post('quizManage/storewithuser', [ QuizManageController::class,'storewithuser'])->name('quizManage.storewithuser');
    Route::resource('quizManage', QuizManageController::class);
    Route::post('quiz/leaderboard', [QuizManageController::class,'leaderboard'])->name('leaderboard.update');
    Route::resource('quizQuestionManage', QuizQuestionManageController::class);


    // address, speciliation, hospital lists manage 
    Route::prefix('master')->name('master.')->group(function () {
        Route::resource('addresses', AddressController::class);
        Route::resource('specializations', SpecializationController::class);
        Route::resource('hospitals', HospitalController::class);
    });


});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

});


//cache route
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
    Artisan::call('storage:link');
    return "Cleared!";
});


Route::get('pdf', function(){
    return view('pdfview.prescription');
});

Route::get('send-notifications', [NotificationController::class, 'index']);


Route::post('manage/notification/send/doctor', [NotificationController::class, 'doctornotification']);



Route::get('/storage-link', function () {
    
    if (File::exists(public_path('storage'))){
        File::delete(public_path('storage'));
    }

    Artisan::call('storage:link');

    return 'Storage link refreshed successfully!';
});



