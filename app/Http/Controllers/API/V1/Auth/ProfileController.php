<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {

        $user = Auth::user();

        return $user;
    }

    public function update()
    {
        return "update your profile";
    }
}
