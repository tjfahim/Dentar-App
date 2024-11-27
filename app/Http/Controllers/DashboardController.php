<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $usersCount = User::where('role', 'user')->count();

        return view('admin.pages.dashboard',
        compact('usersCount'));
    }
}
