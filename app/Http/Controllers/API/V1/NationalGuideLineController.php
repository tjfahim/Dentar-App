<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\NatioalGuideResource;
use App\Models\NationalGuideLine;
use Illuminate\Http\Request;

class NationalGuideLineController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'National guideline list',
            'success' => true,
            'data' => NatioalGuideResource::collection(NationalGuideLine::all())
        ]);
    }
}
