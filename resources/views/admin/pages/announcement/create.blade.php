@extends('admin.layouts.master')

@section('title')
Create Announcement |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add New Announcement</h4>

                <form action="{{ route('announcements.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="news">Title <span class="text-danger">*</span></label>
                        <input type="text" name="news" id="news" class="form-control" placeholder="Enter announcement title" value="{{ old('news') }}" required>

                        @error('news')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">-- Select Status --</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'status' ? 'selected' : '' }}>Inactive</option>
                        </select>

                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save Announcement</button>
                        <a href="{{ route('announcements.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
