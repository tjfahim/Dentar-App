<?php

namespace App\Http\Controllers\Admin\Master;

use App\Models\DoctorSpecialty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
   public function index()
    {
        $specialties = DoctorSpecialty::latest()->get();

        // return $hospitals;
        return view('admin.pages.master.specialization.index', [
            'specialties' => $specialties, 
        ]);
    }

    public function store(Request $request)
    {
 
        $attributes = $request->validate([
            'name' => ['required', 'string'],
        ]);

        DoctorSpecialty::create($attributes);

        return redirect()->route('master.specializations.index')->with('success', 'Specialization added successfully!');
    }

     public function update(Request $request, DoctorSpecialty $specialization)
    {

       $attributes = $request->validate([
            'name' => ['required', 'string'],
        ]);

        $specialization->update($attributes);

        return redirect()->route('master.specializations.index')->with('success', 'Specialization updated successfully!');
    }

    public function destroy(DoctorSpecialty $specialization)
    {
        $specialization->delete();

         return redirect()->route('master.specializations.index')->with('success', 'Specialization deleted successfully!');
    }
}
