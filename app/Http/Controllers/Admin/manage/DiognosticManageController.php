<?php

namespace App\Http\Controllers\Admin\manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diognostic;
use App\Models\Doctor;

class DiognosticManageController extends Controller
{
    public function index()
    {
        $cases = Diognostic::query();

        if(request()->input('filter_option')){


            switch(request()->input('filter_option')){
                case 'last_7_days':
                    $cases->last7Days();
                    break;
                case 'last_30_days':
                    $cases->last30Days();
                    break;
                case 'custom':
                    $from = request()->query->get('start_date');
                    $to = request()->query->get('end_date');

                    $cases->FilterByDate($from, $to);
                    break;
            }

        }

        $cases = $cases->get();


        return view('admin.pages.summery.diognostic.index', [
            'diagnostic_cases' => $cases
        ]);
    }


    public function edit($id)
    {
        $case = Diognostic::findOrFail($id);

        return view('admin.pages.summery.diognostic.edit', [
            'case' => $case,
            'doctors' => Doctor::where('role', 'admin')->get()
        ]);
    }

    public function update(Request $request, $id)
{
    $diagnosticCase = Diognostic::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer|min:0|max:120',
        'gender' => 'required|in:male,female,other',
        'number' => 'required|string|max:20',
        'problem_title' => 'required|string|max:255',
        'doctor_id' => 'required|exists:doctors,id',
        'files.*' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:2048',
    ]);

    $diagnosticCase->name = $request->name;
    $diagnosticCase->age = $request->age;
    $diagnosticCase->gender = $request->gender;
    $diagnosticCase->number = $request->number;
    $diagnosticCase->problem_title = $request->problem_title;
    $diagnosticCase->problem = $request->problem;

    // Retain the existing value for patient_type and patient_id if not provided
    $diagnosticCase->patient_type = $request->input('patient_type', $diagnosticCase->patient_type);
    $diagnosticCase->patient_id = $request->input('patient_id', $diagnosticCase->patient_id);

    $diagnosticCase->doctor_id = $request->doctor_id;

    if ($request->hasFile('files')) {
        if ($diagnosticCase->file && is_array($diagnosticCase->file)) {
            foreach ($diagnosticCase->file as $filePath) {
                if (file_exists(public_path('storage/' . $filePath))) {
                    unlink(public_path('storage/' . $filePath));
                }
            }
        }

        $filePaths = [];
        foreach ($request->file('files') as $file) {
            $filePaths[] = $file->store('diagnostic_cases', 'public');
        }

        $diagnosticCase->file = $filePaths;
    }

    $diagnosticCase->save();

    return redirect()->route('diagnostic_case.index')->with('success', 'Diagnostic case updated successfully.');
}





    public function destroy($id)
    {
        $diagnosticCase = Diognostic::findOrFail($id);

        $files = json_decode($diagnosticCase->file, true);

        if (is_array($files)) {
            foreach ($files as $filePath) {
                if ($filePath && file_exists(public_path($filePath))) {
                    unlink(public_path($filePath));
                }
            }
        }

        $diagnosticCase->delete();

        return redirect()->route('diagnostic_case.index')->with('success', 'Diagnostic case deleted successfully');
    }


}
