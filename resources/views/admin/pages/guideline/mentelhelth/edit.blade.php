@extends('admin.layouts.master')

@section('title')
Edit Mental Health Guide |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Mental Health Guide</h4>
                <form action="{{ route('mentelhelth.update', $guide->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $guide->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" required>{{ old('description', $guide->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="file">File (PDF)</label>
                        <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if ($guide->file)
                            <div class="mt-2">
                                <a href="{{ asset($guide->file) }}" target="_blank">Current File</a>
                            </div>
                        @endif
                    </div>

                    <div class="form-group mt-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="active" {{ old('status', $guide->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $guide->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update Mental Health Guide</button>
                    <a href="{{ route('mentelhelth.index') }}" class="btn btn-secondary mt-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
