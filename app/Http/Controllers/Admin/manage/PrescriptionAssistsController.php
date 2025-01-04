<?php

namespace App\Http\Controllers\Admin\manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrescriptionAssist;

class PrescriptionAssistsController extends Controller
{
    public function index()
    {
        $cases = PrescriptionAssist::query();

        if (request()->input('filter_option')) {
            switch (request()->input('filter_option')) {
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

        return view('admin.pages.summery.prescription_assists.index', [
            'prescription_assists' => $cases,
        ]);
    }

    public function edit($id)
    {
        $case = PrescriptionAssist::findOrFail($id);

        return view('admin.pages.summery.prescription_assists.edit', [
            'prescriptionAssist' => $case,
        ]);
    }

    public function update(Request $request, $id)
    {
        $assist = PrescriptionAssist::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpg,png|max:2048',
            'description' => 'nullable|string',
            'replay_user_type' => 'nullable|string|max:255',
            'replay_user_id' => 'nullable|exists:users,id',
        ]);

        $assist->title = $request->title;
        $assist->description = $request->description;
        $assist->replay_user_type = $request->replay_user_type;
        $assist->replay_user_id = $request->replay_user_id;

        if ($request->hasFile('image')) {
            if ($assist->image && file_exists(public_path('storage/' . $assist->image))) {
                unlink(public_path('storage/' . $assist->image));
            }

            $assist->image = $request->file('image')->store('prescription_assists', 'public');
        }

        $assist->save();

        return redirect()->route('prescription_assists.index')->with('success', 'Prescription Assist updated successfully.');
    }

    public function destroy($id)
    {
        $assist = PrescriptionAssist::findOrFail($id);

        if ($assist->image && file_exists(public_path('storage/' . $assist->image))) {
            unlink(public_path('storage/' . $assist->image));
        }

        $assist->delete();

        return redirect()->route('prescription_assists.index')->with('success', 'Prescription Assist deleted successfully');
    }
}
