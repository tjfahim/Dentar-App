<?php

use App\Http\Controllers\Admin\BookController;
// use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AppSettingManageController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SettingsControler;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuizManageController;
use App\Http\Controllers\QuizQuestionManageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingManageController;
use App\Models\AppSettingManage;
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
    $settings = AppSettingManage::first();
    return view('privacy-policy', ['settings' => $settings]);
});


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
