<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\NatioalGuideResource;
use Illuminate\Http\Request;

use App\Models\ChronicCare;
use App\Models\TeenagerHelp;
use App\Models\DiabeticGuide;
use App\Models\FemaleHealthGuide;
use App\Models\HeartGuide;
use App\Models\KidneyGuide;
use App\Models\MentelHelthGuide;
use App\Models\PregnantMotherGuide;
use App\Models\SkinGuide;
use App\Models\HepaticGuide;

class EmergencyHelpGuideController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Emergency Help Guide',
            'success' => true,
            'data' => [
                'chronic_care_guide' => NatioalGuideResource::collection(ChronicCare::all()),
                'teenage_guide' =>  NatioalGuideResource::collection(TeenagerHelp::all()),
                'female_health_guide' =>  NatioalGuideResource::collection(FemaleHealthGuide::all()),
                'pregnant_mother_guide' => NatioalGuideResource::collection(PregnantMotherGuide::all()),
                'skine_care_guide' =>  NatioalGuideResource::collection(SkinGuide::all()),
                'diabatic_guide' =>  NatioalGuideResource::collection(DiabeticGuide::all()),
                'hepatic_guide' => NatioalGuideResource::collection(HepaticGuide::all()),
                'kidney_guide' => NatioalGuideResource::collection(KidneyGuide::all()),
                'heart_guide' => NatioalGuideResource::collection(HeartGuide::all()),
                'mental_helth_guide' => NatioalGuideResource::collection(MentelHelthGuide::all())
            ]
        ]);
    }
}
