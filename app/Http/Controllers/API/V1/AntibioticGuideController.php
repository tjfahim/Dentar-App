<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AntibioticResource;
use App\Models\AntibioticGuideline;
use Illuminate\Http\Request;

class AntibioticGuideController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'message' => "Antibiotic information",
            'success' => true,
            'data' => AntibioticResource::collection(AntibioticGuideline::all())
        ]);
    }
}
