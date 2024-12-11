@extends('admin.layouts.master')

@section('title')
    Edit Quiz |
@endsection

@section('content')
<div class="row mt-4 d-flex justify-content-center">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <form action="{{ route('quizManage.update', $record->id) }}" method="post">
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
                        <h4 class="card-title">Edit Quiz</h4>
                        <a href="{{ route('quizManage.index') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="List Quizzes"><i class="mdi mdi-step-backward"></i> List Quizzes</a>
                    </div>
                    <div class="row mt-5">
                        <div class="mt-2">
                            <label for="name">Quiz Title</label>
                            <input type="text" name="name" class="form-control border-info" value="{{ old('name', $record->name) }}" placeholder="Enter Quiz Title">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control border-info" placeholder="Enter Description">{{ old('description', $record->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                   
                        <div class="mt-2">
                            <label for="start_time">Start Time</label>
                            <input type="datetime-local" name="start_time" class="form-control border-info" value="{{ old('start_time', $record->start_time) }}" required>
                            @error('start_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="end_time">End Time</label>
                            <input type="datetime-local" name="end_time" class="form-control border-info" value="{{ old('end_time', $record->end_time) }}" required>
                            @error('end_time')
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
@endsection
