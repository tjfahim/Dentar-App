@extends('admin.layouts.master')

@section('title')
Edit Antibiotic Guideline |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Antibiotic Guideline</h4>

                <form action="{{ route('antibiotic.update', $guideline->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $guideline->title }}" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="4" required>{{ $guideline->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Replace File (Optional)</label>
                        <input type="file" class="form-control" name="file" accept=".pdf">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="active" {{ $guideline->status ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ !$guideline->status ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
