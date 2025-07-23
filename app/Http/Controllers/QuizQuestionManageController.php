<?php

namespace App\Http\Controllers;

use App\Models\QuizManage;
use App\Models\QuizQuestionManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class QuizQuestionManageController extends Controller
{
    public function index()
    {
        $records = QuizQuestionManage::orderBy('id', 'DESC')->get();
        return view('admin.pages.quiz_questions.index', compact('records'));
    }

    public function create()
    {
        $quizzes = QuizManage::orderBy('id', 'DESC')->get();
        return view('admin.pages.quiz_questions.create', compact('quizzes')); // Pass quizzes to the view
    }

    public function store(Request $request)
    {
        // Validation for quiz question creation
        $validator = Validator::make($request->all(), [
            'quiz_manage_id' => 'nullable|exists:quiz_manages,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            'option_1' => 'nullable|string|max:255',
            'option_2' => 'nullable|string|max:255',
            'option_3' => 'nullable|string|max:255',
            'option_4' => 'nullable|string|max:255',
            'points' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        // Store new quiz question with a default value for points if not provided
        $data = $request->all();
        $data['points'] = $data['points'] ?? 1; // Set default value for points
        
        if($data['question_type'] == 'answer_type'){
            $data['answer'] = strtolower(trim($data['answer']));
        }
        
        

        QuizQuestionManage::create($data);

        return redirect()->route('quizQuestionManage.index')->with('success', 'Quiz question added successfully.');
    }

    public function edit($id)
    {
        // Fetch the quiz question to edit
        $record = QuizQuestionManage::findOrFail($id);
        $quizzes = QuizManage::orderBy('id', 'DESC')->get(); // Fetch quizzes for dropdown
        return view('admin.pages.quiz_questions.edit', compact('record', 'quizzes')); // Pass data to view
    }

    public function update(Request $request, $id)
    {
        // Fetch quiz question to update
        $record = QuizQuestionManage::findOrFail($id);

        // Validation for updating
        $validator = Validator::make($request->all(), [
            'quiz_manage_id' => 'nullable|exists:quiz_manages,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            'option_1' => 'nullable|string|max:255',
            'option_2' => 'nullable|string|max:255',
            'option_3' => 'nullable|string|max:255',
            'option_4' => 'nullable|string|max:255',
            'points' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $data = $request->all();
        $data['points'] = $data['points'] ?? 1; // Set default value for points
        
        if($data['question_type'] == 'answer_type'){
            $data['answer'] = strtolower(trim($data['answer']));
        }

        $record->update($data);

        return redirect()->route('quizQuestionManage.index')->with('success', 'Quiz question updated successfully.');
    }

    public function destroy($id)
    {
        $record = QuizQuestionManage::findOrFail($id);
        $record->delete();
        return redirect()->route('quizQuestionManage.index')->with('success', 'Quiz question deleted successfully.');
    }
}
