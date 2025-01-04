@extends('admin.layouts.master')
@section('title')
Doctor Manage |
@endsection
@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Doctor Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                        <a href="{{ route('doctor.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Doctor"><i class="mdi mdi-library-plus"></i> Add Doctor</a>
                    </div>
                </div>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{ settings()->website_name }}</h1>
                        <p class="mt-1">{{ settings()->address }}</p>
                        <p class="mt-1">{{ settings()->website_email }}</p>
                    </div>
                    <table id="usersTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th># Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Specialization</th>
                                <th>Status</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <tbody id="usersTableBody">
                            @forelse ($doctors as $doctor)
                            <tr class="text-center">
                                <td>{{ $doctor->id }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->email }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->specialization }}</td>
                                <td>
                                    @if ($doctor->status == '1')
                                        <span style="color: green">Active</span>
                                  
                                    @elseif ($doctor->status == '0')
                                        <span style="color: darkred">Suspend</span>
                                    @endif
                                </td>
                                <td class="action d-flex justify-content-center align-items-center">
                                    <!-- Show Button -->
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-success me-2"
                                        data-toggle="modal"
                                        data-target="#doctorModal"
                                        onclick="showDoctorDetails({{ $doctor }})"
                                        title="View Doctor">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                    <!-- Edit Button -->
                                    <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Doctor">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('doctor.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Doctor">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="7">No data found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="doctorModal" tabindex="-1" aria-labelledby="doctorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="doctorModalLabel">Doctor Details</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> <span id="doctorName"></span></p>
                        <p><strong>Email:</strong> <span id="doctorEmail"></span></p>
                        <p><strong>Phone:</strong> <span id="doctorPhone"></span></p>
                        <p><strong>Specialization:</strong> <span id="doctorSpecialization"></span></p>
                        <p><strong>Gender:</strong> <span id="doctorGender"></span></p>
                        <p><strong>Date of Birth:</strong> <span id="doctorDob"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Hospital:</strong> <span id="doctorHospital"></span></p>
                        <p><strong>Degree:</strong> <span id="doctorDegree"></span></p>
                        <p><strong>Address:</strong> <span id="doctorAddress"></span></p>
                        <p><strong>BMDc Number:</strong> <span id="doctorBmdcNumber"></span></p>
                        <p><strong>Biography:</strong> <span id="doctorBiography"></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img id="doctorImage" src="" alt="Doctor's Image" class="img-fluid" style="max-height: 150px;">
                        <p><img id="doctorSignature" src="" alt="Signature" class="img-fluid" style="max-height: 50px;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


<script>
    function showDoctorDetails(doctor) {
        document.getElementById('doctorName').innerText = doctor.name;
        document.getElementById('doctorEmail').innerText = doctor.email;
        document.getElementById('doctorPhone').innerText = doctor.phone;
        document.getElementById('doctorSpecialization').innerText = doctor.specialization;
        document.getElementById('doctorGender').innerText = doctor.gender;
        document.getElementById('doctorDob').innerText = doctor.dob;
        document.getElementById('doctorHospital').innerText = doctor.hospital;
        document.getElementById('doctorDegree').innerText = doctor.degree;
        document.getElementById('doctorAddress').innerText = doctor.address;
        document.getElementById('doctorBmdcNumber').innerText = doctor.bmdc_number;
        document.getElementById('doctorBiography').innerText = doctor.biography;
        document.getElementById('doctorImage').src = doctor.image || '/path-to-default-image.jpg';
        document.getElementById('doctorSignature').src = doctor.signature || '/path-to-default-signature.jpg';
    }

</script>
