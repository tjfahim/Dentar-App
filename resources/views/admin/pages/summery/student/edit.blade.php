@extends('admin.layouts.master')
@section('title')
    Edit Student |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Student</h4>
                <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $student->name) }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label fw-bold">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $student->phone) }}" required>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label fw-bold">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">-- Select Gender --</option>
                                <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-md-6 mb-3">
                            <label for="dob" class="form-label fw-bold">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $student->dob) }}" required>
                            @error('dob')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="col-md-6 mb-3">
                            <label for="address" class="form-label fw-bold">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $student->address) }}" required>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- University -->
                        <div class="col-md-6 mb-3">
                            <label for="university" class="form-label fw-bold">University</label>
                            <input type="text" class="form-control" id="university" name="university" value="{{ old('university', $student->university) }}">
                            @error('university')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Year -->
                        <div class="col-md-6 mb-3">
                            <label for="year" class="form-label fw-bold">Year</label>
                            <input type="text" class="form-control" id="year" name="year" value="{{ old('year', $student->year) }}">
                            @error('year')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Specialization -->
                        <div class="col-md-6 mb-3">
                            <label for="specialization" class="form-label fw-bold">Specialization</label>
                            <input type="text" class="form-control" id="specialization" name="specialization" value="{{ old('specialization', $student->specialization) }}">
                            @error('specialization')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Medical History -->
                        <div class="col-md-6 mb-3">
                            <label for="medical_history" class="form-label fw-bold">Medical History</label>
                            <textarea class="form-control" id="medical_history" name="medical_history">{{ old('medical_history', $student->medical_history) }}</textarea>
                            @error('medical_history')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Bio -->
                        <div class="col-md-6 mb-3">
                            <label for="bio" class="form-label fw-bold">Bio</label>
                            <textarea class="form-control" id="bio" name="bio">{{ old('bio', $student->bio) }}</textarea>
                            @error('bio')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label fw-bold">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if($student->image)
                                <img src="{{ asset('storage/' . $student->image) }}" alt="Student Image" width="100" class="mt-2">
                            @endif
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
