<?php

use App\Http\Controllers\API\AuthApi;
use App\Http\Controllers\API\InAppItemsApi;
use App\Http\Controllers\API\SubscriptionApi;
use App\Http\Controllers\API\MessageApi;
use App\Http\Controllers\API\RoomApi;
use App\Http\Controllers\API\FollowingApi;
use App\Http\Controllers\API\GiftManageApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Hash;


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
