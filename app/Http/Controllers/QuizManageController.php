<?php

namespace App\Http\Controllers;

use App\Models\QuizManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class QuizManageController extends Controller
{
   
    public function index()
    {
        $records = QuizManage::orderBy('id', 'DESC')->get();
        return view('admin.pages.quiz_manages.index', compact('records'));
    }

    public function create()
    {
        return view('admin.pages.quiz_manages.create'); // Pass modules to the view
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $input = $request->all();
        QuizManage::create($input);

        return redirect()->route('quizManage.index')->with('success', 'Quiz added successfully.');
    }

    public function edit($id)
    {
        $record = QuizManage::findOrFail($id);
        return view('admin.pages.quiz_manages.edit', compact('record')); // Pass record and modules to the view
    }

    public function update(Request $request, $id)
    {
        $record = QuizManage::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $input = $request->all();
        $record->update($input);

        return redirect()->route('quizManage.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy($id)
    {
        $record = QuizManage::findOrFail($id);
        $record->delete();
        return redirect()->route('quizManage.index')->with('success', 'Quiz deleted successfully.');
    }
}
