<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\NatioalGuideResource;
use App\Models\TeenagerHelp;

class TeenagerHelpController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Teenager  Help guide list',
            'success' => true,
            'data' => NatioalGuideResource::collection(TeenagerHelp::all())
        ]);
    }
}
