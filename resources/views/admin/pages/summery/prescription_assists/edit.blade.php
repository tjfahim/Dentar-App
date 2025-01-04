@extends('admin.layouts.master')
@section('title', 'Edit Prescription Assist')

@section('content')
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Prescription Assist</h4>
                <form action="{{ route('prescription_assists.update', $prescriptionAssist->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Title -->
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $prescriptionAssist->title) }}" required>
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Image -->
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if($prescriptionAssist->image)
                                <a href="{{ asset('storage/' . $prescriptionAssist->image) }}" target="_blank" class="d-block mt-2">View Image</a>
                            @endif
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Description -->
                        <div class="col-md-6 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" required>{{ old('description', $prescriptionAssist->description) }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- User -->
                        -->
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Prescription Assist</button>
                        <a href="{{ route('prescription_assists.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
