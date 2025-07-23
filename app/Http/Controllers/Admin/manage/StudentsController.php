<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    // Display the list of students
    public function index()
    {
        $students = Student::orderBy('id', 'DESC')->get();
        return view('admin.pages.summery.student.index', compact('students'));
    }

    // Show the form to create a new student
    public function create()
    {
        return view('admin.pages.summery.student.create');
    }

    // Store a new student in the database
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|unique:students,phone',
            'password' => 'required|string|min:8',
            'image' => 'nullable|image',
            'address' => 'nullable|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'university' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'medical_history' => 'nullable|string',
            'additional_info' => 'nullable|string',
            'bio' => 'nullable|string',
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
            $imageFile->move(public_path('images/students'), $imageName);
            $data['image'] = 'images/students/' . $imageName;
        }

        Student::create($data);

        return redirect()->route('student.index')->with('success', 'Student added successfully');
    }

    // Show the form to edit the existing student
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.pages.summery.student.edit', compact('student'));
    }

    // Update an existing student in the database
    public function update(Request $request, Student $student)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $student->id,
        'phone' => 'required|string|unique:students,phone,' . $student->id,
        'password' => 'nullable|string|min:8',
        'image' => 'nullable|image',
        'address' => 'nullable|string|max:255',
        'dob' => 'nullable|date',
        'gender' => 'nullable|string',
        'university' => 'nullable|string|max:255',
        'year' => 'nullable|string|max:255',
        'specialization' => 'nullable|string|max:255',
        'medical_history' => 'nullable|string',
        'additional_info' => 'nullable|string',
        'bio' => 'nullable|string',
        'organization' => 'nullable|string|max:255',
        'occupation' => 'nullable|string|max:255',
    ]);

    $data = $validated;

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    } else {
        $data['password'] = $student->password;
    }

    if ($request->hasFile('image')) {
        $imageFile = $request->file('image');
        $imageName = time() . '_image.' . $imageFile->getClientOriginalExtension();
        $imageFile->move(public_path('images/students'), $imageName);
        $data['image'] = 'images/students/' . $imageName;

        if ($student->image && file_exists(public_path($student->image))) {
            unlink(public_path($student->image));
        }
    }

    $student->update($data);

    return redirect()->route('student.index')->with('success', 'Student updated successfully');
}


    // Show a student's details
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.pages.summery.student.show', compact('student'));
    }

    // Delete a student from the database
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if ($student->image && file_exists(public_path($student->image))) {
            unlink(public_path($student->image));
        }

        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student deleted successfully');
    }
}
