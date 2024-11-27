<form action="{{ route('appSettingManage.userStoreUpdate') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="row">
            <div class="mt-2 col-6">
                <label for="course_passing_percentage">Course Passing Percentage</label>
                <input type="number" name="course_passing_percentage" class="form-control border-info" value="{{ old('course_passing_percentage', $record->course_passing_percentage ?? '' ) }}" placeholder="Enter Course Passing Percentage">
                @error('course_passing_percentage')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-2 col-6">
                <label for="course_quiz_passing_percentage">Course Quiz Passing Percentage</label>
                <input type="number" name="course_quiz_passing_percentage" class="form-control border-info" value="{{ old('course_quiz_passing_percentage', $record->course_quiz_passing_percentage ?? '') }}" placeholder="Enter Course Quiz Passing Percentage">
                @error('course_quiz_passing_percentage')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-2 col-6">
                <label for="level_passing_percentage">Level Passing Percentage</label>
                <input type="number" name="level_passing_percentage" class="form-control border-info" value="{{ old('level_passing_percentage', $record->level_passing_percentage ?? '') }}" placeholder="Enter Level Passing Percentage">
                @error('level_passing_percentage')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-2 col-6">
                <label for="course_quiz_limit">Course Quiz Limit</label>
                <input type="number" name="course_quiz_limit" class="form-control border-info" value="{{ old('course_quiz_limit', $record->course_quiz_limit ?? '') }}" placeholder="Enter Course Quiz Limit">
                @error('course_quiz_limit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-2 col-6">
                <label for="level_quiz_limit">Level Quiz Limit</label>
                <input type="number" name="level_quiz_limit" class="form-control border-info" value="{{ old('level_quiz_limit', $record->level_quiz_limit ?? '') }}" placeholder="Enter Level Quiz Limit">
                @error('level_quiz_limit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-sm btn-success"><i class="mdi mdi-content-save"></i> Save</button>
            </div>
        </div>
    </div>
</form>
