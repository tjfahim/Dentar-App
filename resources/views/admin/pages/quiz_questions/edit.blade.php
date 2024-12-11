@extends('admin.layouts.master')

@section('title')
    Edit Quiz Question |
@endsection

@section('content')
<div class="row mt-4 d-flex justify-content-center">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <form action="{{ route('quizQuestionManage.update', $record->id) }}" method="post">
                @csrf
 @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif            @method('PUT')
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edit Quiz Question</h4>
                        <a href="{{ route('quizQuestionManage.index') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="List Quiz Questions"><i class="mdi mdi-step-backward"></i> List Questions</a>
                    </div>
                    <div class="row mt-5">
                        <div class="mt-2">
                            <label for="quiz_manage_id">Select Quiz</label>
                            <select id="quiz_manage_id" name="quiz_manage_id" class="form-control border-info">
                                <option value="">Select Quiz</option>
                                @foreach($quizzes as $quiz)
                                    <option value="{{ $quiz->id }}" {{ old('quiz_manage_id', $record->quiz_manage_id) == $quiz->id ? 'selected' : '' }}>
                                        {{ $quiz->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('quiz_manage_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="question">Question</label>
                            <input type="text" name="question" class="form-control border-info" value="{{ old('question', $record->question) }}" placeholder="Enter Question" required>
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="answer">Answer</label>
                            <input type="text" name="answer" class="form-control border-info" value="{{ old('answer', $record->answer) }}" placeholder="Enter Correct Answer" required>
                            @error('answer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                        <label for="question_type">Question Type</label>
                        <select id="question_type" name="question_type" class="form-control border-info" required>
                            <option value="multiple_choice" {{ old('question_type', $record->question_type) == 'multiple_choice' ? 'selected' : '' }}>Multiple Choice</option>
                            <option value="answer_type" {{ old('question_type', $record->question_type) == 'answer_type' ? 'selected' : '' }}>Answer Type</option>
                        </select>
                        @error('question_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="mt-2">
                            <label for="option_1">Option 1</label>
                            <input type="text" name="option_1" id="option_1" class="form-control border-info" value="{{ old('option_1', $record->option_1) }}" placeholder="Enter Option 1">
                            @error('option_1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="option_2">Option 2</label>
                            <input type="text" name="option_2" id="option_2" class="form-control border-info" value="{{ old('option_2', $record->option_2) }}" placeholder="Enter Option 2">
                            @error('option_2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="option_3">Option 3</label>
                            <input type="text" name="option_3" id="option_3" class="form-control border-info" value="{{ old('option_3', $record->option_3) }}" placeholder="Enter Option 3">
                            @error('option_3')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="option_4">Option 4</label>
                            <input type="text" name="option_4" id="option_4" class="form-control border-info" value="{{ old('option_4', $record->option_4) }}" placeholder="Enter Option 4">
                            @error('option_4')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="points">Points</label>
                            <input type="number" name="points" class="form-control border-info" value="{{ old('points', $record->points) }}" placeholder="Enter Points" min="1">
                            @error('points')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control border-info">
                                <option value="1" {{ old('status', $record->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $record->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-sm btn-info"><i class="mdi mdi-content-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the elements
        const questionType = document.getElementById("question_type");
        const option1 = document.getElementById("option_1");
        const option2 = document.getElementById("option_2");
        const option3 = document.getElementById("option_3");
        const option4 = document.getElementById("option_4");

        // Function to toggle the required attribute on options
        function toggleOptionRequirements() {
            if (questionType.value === "multiple_choice") {
                // Make options 1 and 2 required, others optional
                option1.required = true;
                option2.required = true;
                option3.required = false;
                option4.required = false;
            } else {
                // Make all options nullable
                option1.required = false;
                option2.required = false;
                option3.required = false;
                option4.required = false;
            }
        }

        // Trigger the function on page load and when the select value changes
        toggleOptionRequirements();
        questionType.addEventListener("change", toggleOptionRequirements);
    });
</script>

@endsection
