@extends('admin.layouts.master')

@section('title')
Edit Video |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Video</h4>
                <form action="{{ route('videomanage.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Title Field -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $video->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div class="form-group mt-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $video->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Video URL Field -->
                    <div class="form-group mt-3">
                        <label for="url">Video URL</label>
                        <input type="url" name="url" id="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url', $video->url) }}" required>
                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Thumbnail Image Field -->
                    <div class="form-group mt-3">
                        <label for="image_poster">Thumbnail Image</label>
                        <input type="file" name="image_poster" id="image_poster" class="form-control @error('image_poster') is-invalid @enderror" accept="image/*">
                        @error('image_poster')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if ($video->image_poster)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $video->image_poster) }}" alt="Current Thumbnail" width="150">
                            </div>
                        @endif
                    </div>

                    <!-- Status Field -->
                    <div class="form-group mt-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="active" {{ old('status', $video->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $video->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <button type="submit" class="btn btn-primary mt-3">Update Video</button>
                    <a href="{{ route('videomanage.index') }}" class="btn btn-secondary mt-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
