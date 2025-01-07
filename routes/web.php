<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\GuideLine\ChronicsCareController;
// use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\manage\PrescriptionAssistsController;
use App\Http\Controllers\Admin\Manage\PrescriptionReadController;
use App\Http\Controllers\Admin\NationalGuideLineController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AppSettingManageController;
use Illuminate\Support\Facades\Route;


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
    $settings = AppSettingManage::first();
    return view('terms-and-conditions', ['settings' => $settings]);
});
Route::get('/privacy-policy', function () {
    $policy = PrivacyPolicy::first();

    return view('privacy-policy', ['policy' => $policy]);
})->name('privacy-policy');

Route::post('user-register', [UserController::class, 'store'])->name('userRegister.store');
Route::post('verify-login', [UserController::class, 'verifyLogin'])->name('verifyLogin');

Route::get('/', function () {
    return view('auth.login');
})->name('/');


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

    Route::resource('slider', SliderController::class);
    Route::resource('book', BookController::class);
    Route::resource('job', JobController::class);
    // NationalGuideLine
    Route::resource('guideline', NationalGuideLineController::class);
    Route::resource('guide/kidney', KidneyGuideController::class);
    Route::resource('guide/femalehelth', FemaleHealthController::class);
    Route::resource('guide/mother', FemaleMotherController::class);
    Route::resource('guide/chronic', ChronicsCareController::class);
    Route::resource('guide/teenager', TeenagerHelpsController::class);
    Route::resource('guide/diabetic', DiabeticGuidesController::class);
    Route::resource('guide/heart', HeartGuidesController::class);
    Route::resource('guide/mentelhelth', MentelHelthGuidesController::class);
    Route::resource('guide/skine', SkineGuidesController::class);
    Route::resource('guide/hepatic', HepaticGuidesController::class);


    // manage all users
    Route::resource('manage/doctor', DoctorsController::class);
    Route::resource('manage/student', StudentsController::class);
    Route::resource('manage/patient', PatientsController::class);
    Route::resource('manage/diagnostic_case', DiognosticManageController::class);
    Route::resource('manage/prescription_assists', PrescriptionAssistsController::class);
    Route::resource('manage/prescription_reads', PrescriptionReadController::class);



    // feedback
    Route::resource('feedback', FeedbackController::class);
    // contact
    Route::resource('contacts', ContactController::class);
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


    Route::resource('quizManage', QuizManageController::class);
    Route::resource('quizQuestionManage', QuizQuestionManageController::class);


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
