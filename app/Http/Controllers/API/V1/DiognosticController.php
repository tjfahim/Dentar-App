<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiognosticResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiognosticController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $cases = $user->cases;



        return $cases;

        return DiognosticResource::collection($cases);

        // if($user->userType == 'doctor'){
        //     return DiognosticResource::collection($user->cases);
        // }elseif($user->userType == 'student'){
        //     return DiognosticResource::collection($user->cases);
        // }
    }
}
