<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Http\Controllers\Controller;
use App\Models\Patient; // Change to Patient model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PatientsController extends Controller
{
    // Display the list of patients
    public function index()
    {
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('admin.pages.summery.patient.index', compact('patients')); // Update view to patient
    }

    // Show the form to create a new patient
    public function create()
    {
        return view('admin.pages.summery.patient.create'); // Update view to patient
    }

    // Store a new patient in the database
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email', // Update table name to patients
            'phone' => 'required|string|unique:patients,phone', // Update table name to patients
            'password' => 'required|string|min:8',
            'image' => 'nullable|image',
            'address' => 'nullable|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'medical_history' => 'nullable|string',
            'organization' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
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
            $imageFile->move(public_path('images/patients'), $imageName); // Update path to 'patients'
            $data['image'] = 'images/patients/' . $imageName;
        }

        Patient::create($data); // Update model to Patient

        return redirect()->route('patient.index')->with('success', 'Patient added successfully'); // Update route name
    }

    // Show the form to edit an existing patient
    public function edit($id)
    {
        $patient = Patient::findOrFail($id); // Update model to Patient
        return view('admin.pages.summery.patient.edit', compact('patient')); // Update view to patient
    }

    // Update an existing patient in the database
    public function update(Request $request, Patient $patient) // Update model to Patient
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $patient->id, // Update table name to patients
            'phone' => 'required|string|unique:patients,phone,' . $patient->id, // Update table name to patients
            'password' => 'nullable|string|min:8',
            'image' => 'nullable|image',
            'address' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string',
            'medical_history' => 'nullable|string',
            'organization' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
        ]);

        $data = $validated;

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            $data['password'] = $patient->password;
        }

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_image.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('images/patients'), $imageName); // Update path to 'patients'
            $data['image'] = 'images/patients/' . $imageName;

            if ($patient->image && file_exists(public_path($patient->image))) {
                unlink(public_path($patient->image));
            }
        }

        $patient->update($data); // Update model to Patient

        return redirect()->route('patient.index')->with('success', 'Patient updated successfully'); // Update route name
    }

    // Show a patient's details
    public function show($id)
    {
        $patient = Patient::findOrFail($id); // Update model to Patient
        return view('admin.pages.summery.patient.show', compact('patient')); // Update view to patient
    }

    // Delete a patient from the database
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id); // Update model to Patient

        if ($patient->image && file_exists(public_path($patient->image))) {
            unlink(public_path($patient->image));
        }

        $patient->delete(); // Update model to Patient

        return redirect()->route('patient.index')->with('success', 'Patient deleted successfully'); // Update route name
    }
}
