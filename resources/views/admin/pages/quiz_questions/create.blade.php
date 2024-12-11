@extends('admin.layouts.master')

@section('title')
    Add Quiz Question |
@endsection

@section('content')
<div class="row mt-4 d-flex justify-content-center">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <form action="{{ route('quizQuestionManage.store') }}" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Add Quiz Question</h4>
                        <a href="{{ route('quizQuestionManage.index') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="List Quiz Questions"><i class="mdi mdi-step-backward"></i> List Questions</a>
                    </div>
                    <div class="row mt-5">
                        <div class="mt-2">
                            <label for="quiz_manage_id">Select Quiz</label>
                            <select id="quiz_manage_id" name="quiz_manage_id" class="form-control border-info">
                                <option value="">Select Quiz</option>
                                @foreach($quizzes as $quiz)
                                    <option value="{{ $quiz->id }}" {{ old('quiz_manage_id') == $quiz->id ? 'selected' : '' }}>
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
                            <input type="text" id="question" name="question" class="form-control border-info" value="{{ old('question') }}" placeholder="Enter Question" required oninput="handleInputChange(this)">
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="answer">Answer</label>
                            <input type="text" id="answer" name="answer" class="form-control border-info" value="{{ old('answer') }}" placeholder="Enter Correct Answer" required oninput="handleInputChange(this)">
                            @error('answer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="question_type">Question Type</label>
                            <select id="question_type" name="question_type" class="form-control border-info" required>
                                <option value="multiple_choice" {{ old('question_type') == 'multiple_choice' ? 'selected' : '' }}>Multiple Choice</option>
                                <option value="answer_type" {{ old('question_type') == 'answer_type' ? 'selected' : '' }}>Answer Type</option>
                            </select>
                            @error('question_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="options-container">
    <div class="mt-2" id="div_option_1">
        <label for="option_1">Option 1</label>
        <input type="text" name="option_1" id="option_1" class="form-control border-info" value="{{ old('option_1') }}" placeholder="Enter Option 1" oninput="handleInputChange(this)">
        @error('option_1')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-2" id="div_option_2">
        <label for="option_2">Option 2</label>
        <input type="text" name="option_2" id="option_2" class="form-control border-info" value="{{ old('option_2') }}" placeholder="Enter Option 2" oninput="handleInputChange(this)">
        @error('option_2')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-2" id="div_option_3">
        <label for="option_3">Option 3</label>
        <input type="text" name="option_3" id="option_3" class="form-control border-info" value="{{ old('option_3') }}" placeholder="Enter Option 3" oninput="handleInputChange(this)">
        @error('option_3')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-2" id="div_option_4">
        <label for="option_4">Option 4</label>
        <input type="text" name="option_4" id="option_4" class="form-control border-info" value="{{ old('option_4') }}" placeholder="Enter Option 4" oninput="handleInputChange(this)">
        @error('option_4')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


                        <div class="mt-2">
                            <label for="points">Points</label>
                            <input type="number" name="points" class="form-control border-info" value="{{ old('points', 1) }}" placeholder="Enter Points" min="1">
                            @error('points')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mt-2">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control border-info">
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
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
        const questionType = document.getElementById("question_type");
        const option1 = document.getElementById("option_1");
        const option2 = document.getElementById("option_2");
        const option3 = document.getElementById("option_3");
        const option4 = document.getElementById("option_4");

        function toggleOptionRequirements() {
            if (questionType.value === "multiple_choice") {
                option1.required = true;
                option2.required = true;
                option3.required = false;
                option4.required = false;
            } else {
                option1.required = false;
                option2.required = false;
                option3.required = false;
                option4.required = false;
            }
        }

        toggleOptionRequirements();
        questionType.addEventListener("change", toggleOptionRequirements);
    });
</script>

@endsection

