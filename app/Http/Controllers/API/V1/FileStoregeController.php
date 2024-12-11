<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileStoregeController extends Controller
{
    public function __invoke(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'array|nullable'
        ]);

        $allfiles = [];
        if($request->has('file')){
            $files = $request->file;

            foreach($files as $key => $value){
                $file = time() . $key. '.'. $value->getClientOriginalExtension();

                $path = public_path('files/all/');

                $fullPath = 'files/all' . $file;


                array_push($allfiles, $fullPath);

                $value->move($path, $file);
            }
        }
        return $allfiles;
    }
}
