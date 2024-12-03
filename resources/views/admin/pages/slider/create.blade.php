@extends('admin.layouts.master')

@section('title')
    Create Slider |
@endsection

@section('content')

<div class="row mt-4 d-flex justify-content-center">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
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
                        <h4 class="card-title">Create Slider</h4>
                        <a href="{{ route('slider.index') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="List Sliders"><i class="mdi mdi-step-backward"></i> List Sliders</a>
                    </div>

                    <div class="row mt-5">
                        <!-- Title Field -->
                        <div class="mt-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control border-info" placeholder="Enter Title" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div class="mt-2">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control border-info" placeholder="Enter Description" rows="3" required></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Upload Field -->
                        <div class="mt-2">
                            <label for="image">Slider Image</label>
                            <input type="file" name="image" class="form-control border-info" accept="image/*" required>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status Dropdown -->
                        <div class="mt-2">
                            <label for="status" class="flex items-center space-x-2">
                                Status:
                                <select id="status" name="status" class="rounded-lg px-4 py-2 border border-gray-300 focus:outline-none">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </label>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-sm btn-success"><i class="mdi mdi-content-save "></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
