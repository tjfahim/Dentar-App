<?php

namespace App\Http\Controllers;

use App\Http\Resources\CaseResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DiagnosticController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        return CaseResource::collection($user->cases);
    }
}
