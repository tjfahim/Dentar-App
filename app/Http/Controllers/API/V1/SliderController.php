<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        // return SliderResource::collection(Slider::all());
        return response()->json([
            'banner' => asset('storage/' . Banner::where('status', true)->first()->image),
            'sociallink' => SocialLink::first()->makeHidden(['id', 'created_at', 'updated_at']),
            'data' => SliderResource::collection(Slider::all()),
        ]);
    }
}
