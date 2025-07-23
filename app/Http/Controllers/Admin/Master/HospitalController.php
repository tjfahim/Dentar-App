<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
   public function index()
    {
        $hospitals = Hospital::with('district')->latest()->get();

        // return $hospitals;
        return view('admin.pages.master.hospital.index', [
            'hospitals' => $hospitals, 
            'districts' => District::all(),
        ]);
    }

    public function store(Request $request)
    {
 
        $attributes = $request->validate([
            'name' => ['required', 'string'],
            'district_id' => ['required', 'string']
        ]);

        Hospital::create($attributes);

        return redirect()->route('master.hospitals.index')->with('success', 'Hospital added successfully!');
    }

     public function update(Request $request, Hospital $hospital)
    {

       $attributes = $request->validate([
            'name' => ['required', 'string'],
            'district_id' => ['required', 'string']
        ]);

        $hospital::create($attributes);

        return redirect()->route('master.hospitals.index')->with('success', 'Hospital updated successfully!');
    }

    public function destroy(Hospital $hospital)
    {
        $hospital->delete();

         return redirect()->route('master.hospitals.index')->with('success', 'Hospital deleted successfully!');
    }
}
