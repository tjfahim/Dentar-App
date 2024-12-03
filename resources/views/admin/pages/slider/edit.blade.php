@extends('admin.layouts.master')

@section('title')
    Edit Slider |
@endsection

@section('content')

<div class="row mt-4 d-flex justify-content-center">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')  <!-- This will use the PUT method for updating the resource -->

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
                        <h4 class="card-title">Edit Slider</h4>
                        <a href="{{ route('slider.index') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="List Sliders"><i class="mdi mdi-step-backward"></i> List Sliders</a>
                    </div>

                    <div class="row mt-5">
                        <!-- Title Field -->
                        <div class="mt-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control border-info" placeholder="Enter Title" value="{{ old('title', $slider->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div class="mt-2">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control border-info" placeholder="Enter Description" rows="3" required>{{ old('description', $slider->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Upload Field (Optional for Update) -->
                        <div class="mt-2">
                            <label for="image">Slider Image</label>
                            <input type="file" name="image" class="form-control border-info" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Display the existing image (Optional) -->
                        @if($slider->image)
                            <div class="mt-2">
                                <label for="current_image">Current Image</label><br>
                                <img src="{{ asset($slider->image) }}" alt="Slider Image" width="150" height="150">
                            </div>
                        @endif

                        <!-- Status Dropdown -->
                        <div class="mt-2">
                            <label for="status" class="flex items-center space-x-2">
                                Status:
                                <select id="status" name="status" class="rounded-lg px-4 py-2 border border-gray-300 focus:outline-none">
                                    <option value="active" {{ $slider->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $slider->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </label>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-sm btn-success"><i class="mdi mdi-content-save"></i> Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
