@extends('admin.layouts.master')
@section('title', 'Edit Diagnostic Case')

@section('content')
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Diagnostic Case</h4>
                <form action="{{ route('diagnostic_case.update', $case->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $case->name) }}" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Age -->
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $case->age) }}" required>
                            @error('age') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Gender -->
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">-- Select Gender --</option>
                                <option value="male" {{ old('gender', $case->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $case->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender', $case->gender) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Number -->
                        <div class="col-md-6 mb-3">
                            <label for="number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="number" name="number" value="{{ old('number', $case->number) }}" required>
                            @error('number') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Problem Title -->
                        <div class="col-md-6 mb-3">
                            <label for="problem_title" class="form-label">Problem Title</label>
                            <input type="text" class="form-control" id="problem_title" name="problem_title" value="{{ old('problem_title', $case->problem_title) }}" required>
                            @error('problem_title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Problem -->
                        <div class="col-md-6 mb-3">
                            <label for="problem" class="form-label">Problem Description</label>
                            <textarea class="form-control" id="problem" name="problem" required>{{ old('problem', $case->problem) }}</textarea>
                            @error('problem') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- <!-- Patient Type -->
                        <div class="col-md-6 mb-3">
                            <label for="patient_type" class="form-label">Patient Type</label>
                            <select class="form-control" id="patient_type" name="patient_type" required>
                                <option value="">-- Select Patient Type --</option>
                                <option value="new" {{ old('patient_type', $case->patient_type) == 'new' ? 'selected' : '' }}>New</option>
                                <option value="returning" {{ old('patient_type', $case->patient_type) == 'returning' ? 'selected' : '' }}>Returning</option>
                            </select>
                            @error('patient_type') <small class="text-danger">{{ $message }}</small> @enderror
                        </div> --}}

                        {{-- <!-- Patient -->
                        <div class="col-md-6 mb-3">
                            <label for="patient_id" class="form-label">Patient</label>
                            <select class="form-control" id="patient_id" name="patient_id" required>
                                <option value="">-- Select Patient --</option>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}" {{ old('patient_id', $case->patient_id) == $patient->id ? 'selected' : '' }}>
                                        {{ $patient->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('patient_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div> --}}

                        <!-- Doctor -->
                        <div class="col-md-6 mb-3">
                            <label for="doctor_id" class="form-label">Doctor</label>
                            <select class="form-control" id="doctor_id" name="doctor_id" required>
                                <option value="">-- Select Doctor --</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}" {{ old('doctor_id', $case->doctor_id) == $doctor->id ? 'selected' : '' }}>
                                        {{ $doctor->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('doctor_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- File -->
                        <div class="col-md-6 mb-3">
                            <label for="file" class="form-label">File</label>
                            <input type="file" class="form-control" id="file" name="file">
                            @if($case->file)
                                <a href="{{ asset('storage/' . $case->file) }}" target="_blank" class="d-block mt-2">View File</a>
                            @endif
                            @error('file') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Case</button>
                        <a href="{{ route('diagnostic_case.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
