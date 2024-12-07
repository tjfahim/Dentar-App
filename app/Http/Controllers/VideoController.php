<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoResource;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        return  VideoResource::collection(Video::latest()->get());
    }
}
