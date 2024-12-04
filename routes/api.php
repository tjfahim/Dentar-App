<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\AuthApi;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Broadcast;

use App\Http\Controllers\API\V1\BookController;
use App\Http\Controllers\API\V1\JobController;
use App\Http\Controllers\API\V1\SliderController;

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


//roopi api
Route::post('login', [AuthApi::class, 'login']);
Route::post('register', [AuthApi::class, 'register']);

Route::post('send-otp', [AuthApi::class, 'sendOtp']);
Route::post('check-otp', [AuthApi::class, 'checkOtp']);
Route::post('reset-password', [AuthApi::class, 'resetPassword']);



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
// Route::apiResource('job', JobController::class)
//     ->only('index');
Route::get('job', [JobController::class, 'index'])->name('job.index');
Route::get('job/{job}', [JobController::class, 'show'])->name('job.show');
Route::post('job/search', [JobController::class, 'search'])->name('job.search');

Route::apiResource('book', BookController::class);
Route::post('book/search', [BookController::class, 'search'])
    ->name('search');

Route::apiResource('sliders', SliderController::class)
    ->only('index');
// h
