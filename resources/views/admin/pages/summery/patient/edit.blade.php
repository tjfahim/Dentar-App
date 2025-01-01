@extends('admin.layouts.master')
@section('title')
    Edit Patient |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Patient</h4>
                <form action="{{ route('patient.update', $patient->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $patient->name) }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $patient->email) }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label fw-bold">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $patient->phone) }}" required>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label fw-bold">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">-- Select Gender --</option>
                                <option value="male" {{ old('gender', $patient->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $patient->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-md-6 mb-3">
                            <label for="dob" class="form-label fw-bold">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $patient->dob) }}" required>
                            @error('dob')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="col-md-6 mb-3">
                            <label for="address" class="form-label fw-bold">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $patient->address) }}" required>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Medical History -->
                        <div class="col-md-6 mb-3">
                            <label for="medical_history" class="form-label fw-bold">Medical History</label>
                            <textarea class="form-control" id="medical_history" name="medical_history">{{ old('medical_history', $patient->medical_history) }}</textarea>
                            @error('medical_history')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Token -->
                        <div class="col-md-6 mb-3">
                            <label for="token" class="form-label fw-bold">Token</label>
                            <input type="text" class="form-control" id="token" name="token" value="{{ old('token', $patient->token) }}">
                            @error('token')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label fw-bold">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if ($patient->image)
                                <img src="{{ asset('storage/'.$patient->image) }}" alt="Patient Image" class="mt-2" style="max-width: 100px;">
                            @endif
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="text-muted">Leave empty if you don't want to change the password</small>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('patient.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
