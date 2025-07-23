<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Doctor;
use App\Models\DoctorSpecialty;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorsController extends Controller
{
    // Display the list of doctors
    public function index()
    {
        $doctors = Doctor::latest()->get();
        
        
        return view('admin.pages.summery.doctor.index', compact('doctors'));
    }
    
    public function diagnosticDoctor()
    {
        $doctors = Doctor::where('role', 'admin')->latest()->get();
        
        
        return view('admin.pages.summery.doctor.diagnosticDoctorList', compact('doctors'));
    }

    // Show the form to create a new doctor
    public function create()
    {
        return view('admin.pages.summery.doctor.create', [
            'specializations' => DoctorSpecialty::all(),
            'addresses' => District::all(),
            'hospital' => Hospital::all(),
        ]);
    }

    // Store a new doctor in the database
    public function store(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required|string|unique:doctors,phone',
            'specialization' => 'required|string',
            'image' => 'nullable|image',
            'signature' => 'nullable|image',
            'hospital' => 'required|string',
            'gender' => 'required|string',
            'biography' => 'nullable|string',
            'dob' => 'required|date',
            'degree' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'bmdc_number' => 'required|string',
            'bmdc_type' => 'required|string',
            'occupation' => 'required|string',
            'organization' => 'required|string',
            'status' => 'required|string',
        ]);


        if ($validated->fails()) {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }

        $data = $request->all();

        $data['password'] = Hash::make($request->password);


        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_image.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('images/doctors'), $imageName);
            $data['image'] = 'images/doctors/' . $imageName;
        }


        if ($request->hasFile('signature')) {
            $signatureFile = $request->file('signature');
            $signatureName = time() . '_signature.' . $signatureFile->getClientOriginalExtension();
            $signatureFile->move(public_path('images/signature'), $signatureName);
            $data['signature'] = 'images/signature/' . $signatureName;
        }



        Doctor::create($data);

        return redirect()->route('doctor.index')->with('success', 'Doctor added successfully');
    }


    // Show the form to edit the existing doctor
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.pages.summery.doctor.edit', [
            'doctor' => $doctor,
            'specializations' => DoctorSpecialty::all(),
            'addresses' => District::all(),
            'hospital' => Hospital::all(),
        ]);
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'phone' => 'required|string|unique:doctors,phone,' . $doctor->id,
            // 'password' => 'required|string',
            'specialization' => 'required|string',
            'image' => 'nullable|image',
            'signature' => 'nullable|image',
            'hospital' => 'nullable|string|max:255',
            'gender' => 'nullable|string',
            'biography' => 'nullable|string',
            'dob' => 'nullable|date',
            'degree' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'bmdc_number' => 'nullable|string',
            'bmdc_type' => 'nullable|string',
            'occupation' => 'nullable|string',
            'organization' => 'nullable|string',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        $data = $validated;
        
        
        

        $data['password'] = $request->password == null ?  $doctor->password :   Hash::make($request->password);


        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_image.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('images/doctors'), $imageName);
            $data['image'] = 'images/doctors/' . $imageName;


            if ($doctor->image && file_exists(public_path($doctor->image))) {
                unlink(public_path($doctor->image));
            }
        }


        if ($request->hasFile('signature')) {
            $signatureFile = $request->file('signature');
            $signatureName = time() . '_signature.' . $signatureFile->getClientOriginalExtension();
            $signatureFile->move(public_path('images/signature'), $signatureName);
            $data['signature'] = 'images/signature/' . $signatureName;


            if ($doctor->signature && file_exists(public_path($doctor->signature))) {
                unlink(public_path($doctor->signature));
            }
        }

        $doctor->update($data);

        return redirect()->route('doctor.index')->with('success', 'Doctor updated successfully');
    }



    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.pages.summery.doctor.show', compact('doctor'));
    }

    // Delete the doctor from the database
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctor.index')->with('success', 'Doctor deleted successfully');
    }
}

