<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrescriptionRead;


class PrescriptionReadController extends Controller
{
    public function index()
    {
        $reads = PrescriptionRead::query();

        if (request()->input('filter_option')) {
            switch (request()->input('filter_option')) {
                case 'last_7_days':
                    $reads->where('created_at', '>=', now()->subDays(7));
                    break;
                case 'last_30_days':
                    $reads->where('created_at', '>=', now()->subDays(30));
                    break;
                case 'custom':
                    $from = request()->input('start_date');
                    $to = request()->input('end_date');

                    $reads->whereBetween('created_at', [$from, $to]);
                    break;
            }
        }

        $reads = $reads->get();

        return view('admin.pages.summery.prescription_reads.index', [
            'prescription_reads' => $reads,
        ]);
    }

    public function edit($id)
    {
        $read = PrescriptionRead::findOrFail($id);

        return view('admin.pages.summery.prescription_reads.edit', [
            'prescriptionRead' => $read,
        ]);
    }

    public function update(Request $request, $id)
    {
        $read = PrescriptionRead::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'files' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:2048',
            'status' => 'required|in:pending,approved,rejected',
            'user_type' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $read->title = $request->title;
        $read->description = $request->description;
        $read->status = $request->status;
        $read->user_type = $request->user_type;
        $read->user_id = $request->user_id;

        if ($request->hasFile('files')) {
            // Delete the old file if it exists
            if ($read->files && file_exists(public_path('storage/' . $read->files))) {
                unlink(public_path('storage/' . $read->files));
            }

            // Store the new file
            $read->files = $request->file('files')->store('prescription_reads', 'public');
        }

        $read->save();

        return redirect()->route('prescription_reads.index')->with('success', 'Prescription Read updated successfully.');
    }

    public function destroy($id)
    {
        $read = PrescriptionRead::findOrFail($id);

        if ($read->files && file_exists(public_path('storage/' . $read->files))) {
            unlink(public_path('storage/' . $read->files));
        }

        $read->delete();

        return redirect()->route('prescription_reads.index')->with('success', 'Prescription Read deleted successfully');
    }
}
