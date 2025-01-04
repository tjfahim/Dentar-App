@extends('admin.layouts.master')

@section('title')
    Edit Doctor |
@endsection

@section('content')

<div class="row mt-4 d-flex justify-content-center">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <form action="{{ route('doctor.update', $doctor->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                        <h4 class="card-title">Edit Doctor</h4>
                        <a href="{{ route('doctor.index') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="List Doctors">
                            <i class="mdi mdi-step-backward"></i> List Doctors
                        </a>
                    </div>
                    <div class="row mt-5">
                        <div class="mt-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control border-info" placeholder="Enter Name" value="{{ old('name', $doctor->name) }}" required>
                        </div>
                        <div class="mt-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control border-info" placeholder="Enter Email" value="{{ old('email', $doctor->email) }}" required>
                        </div>
                        <div class="mt-2">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control border-info" placeholder="Enter New Password (leave blank to keep current)">
                        </div>
                        <div class="mt-2">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control border-info" placeholder="Enter Phone" value="{{ old('phone', $doctor->phone) }}">
                        </div>
                        <div class="mt-2">
                            <label for="specialization">Specialization</label>
                            <input type="text" name="specialization" class="form-control border-info" placeholder="Enter Specialization" value="{{ old('specialization', $doctor->specialization) }}">
                        </div>
                        <div class="mt-2">
                            <label for="hospital">Hospital/Clinic</label>
                            <input type="text" name="hospital" class="form-control border-info" placeholder="Enter Hospital/Clinic" value="{{ old('hospital', $doctor->hospital) }}">
                        </div>
                        <div class="mt-2">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control border-info">
                                <option value="male" {{ old('gender', $doctor->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $doctor->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender', $doctor->gender) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" class="form-control border-info" value="{{ old('dob', $doctor->dob) }}">
                        </div>
                        <div class="mt-2">
                            <label for="degree">Degree/Qualifications</label>
                            <input type="text" name="degree" class="form-control border-info" placeholder="Enter Degree/Qualifications" value="{{ old('degree', $doctor->degree) }}">
                        </div>
                        <div class="mt-2">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control border-info" placeholder="Enter Address" value="{{ old('address', $doctor->address) }}">
                        </div>
                        <div class="mt-2">
                            <label for="bmdc_number">BMDC Number</label>
                            <input type="text" name="bmdc_number" class="form-control border-info" placeholder="Enter BMDC Number" value="{{ old('bmdc_number', $doctor->bmdc_number) }}">
                        </div>
                        <div class="mt-2">
                            <label for="bmdc_type">BMDC Type</label>
                            <input type="text" name="bmdc_type" class="form-control border-info" placeholder="Enter BMDC Type" value="{{ old('bmdc_type', $doctor->bmdc_type) }}">
                        </div>
                        <div class="mt-2">
                            <label for="organization">Organization</label>
                            <input type="text" name="organization" class="form-control border-info" placeholder="Enter Organization" value="{{ old('organization', $doctor->organization) }}">
                        </div>
                        <div class="mt-2">
                            <label for="occupation">Occupation</label>
                            <input type="text" name="occupation" class="form-control border-info" placeholder="Enter Occupation" value="{{ old('occupation', $doctor->occupation) }}">
                        </div>
                        <div class="mt-2">
                            <label for="biography">Biography</label>
                            <textarea name="biography" class="form-control border-info" placeholder="Enter Biography">{{ old('biography', $doctor->biography) }}</textarea>
                        </div>
                        <div class="mt-2">
                            <label for="image">Doctor's Image</label>
                            <input type="file" name="image" class="form-control border-info">
                        </div>
                        <div class="mt-2">
                            <label for="signature">Signature Image</label>
                            <input type="file" name="signature" class="form-control border-info">
                        </div>
                        <div class="mt-2">
                            <label for="role">Role</label>
                            <select name="role" class="form-control border-info">
                                <option value="admin" {{ old('role', $doctor->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="normal" {{ old('role', $doctor->role) == 'normal' ? 'selected' : '' }}>Normal</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="status">Status</label>
                            <select name="status" class="form-control border-info">
                                <option value="1" {{ old('status', $doctor->status) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $doctor->status) == '0' ? 'selected' : '' }}>Suspend</option>
                            </select>
                        </div>

                    </div>
                    <div class="d-flex justify-content-end mt-2">
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="mdi mdi-content-save"></i> Update
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
