@extends('admin.layouts.master')
@section('title')
Patient Manage |
@endsection
@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Patient Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                        <a href="{{ route('patient.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Patient">
                            <i class="mdi mdi-library-plus"></i> Add Patient
                        </a>
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
                                <th>address</th>

                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <tbody id="usersTableBody">
                            @forelse ($patients as $patient)
                            <tr class="text-center">
                                <td>{{ $patient->id }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->email }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ $patient->address }}</td>


                                <td class="action d-flex justify-content-center align-items-center">
                                    <!-- Show Button -->
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-success me-2"
                                        data-toggle="modal"
                                        data-target="#patientModal"
                                        onclick="showPatientDetails({{ $patient }})"
                                        title="View Patient">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                    <!-- Edit Button -->
                                    <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Patient">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('patient.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Patient">
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
<div class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="patientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="patientModalLabel">Patient Details</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> <span id="patientName"></span></p>
                        <p><strong>Email:</strong> <span id="patientEmail"></span></p>
                        <p><strong>Phone:</strong> <span id="patientPhone"></span></p>
                        <p><strong>Gender:</strong> <span id="patientGender"></span></p>
                        <p><strong>Date of Birth:</strong> <span id="patientDob"></span></p>

                    </div>
                    <div class="col-md-6">

                        <p><strong>Medical History:</strong> <span id="patientMedicalHistory"></span></p>
                        <p><strong>Address:</strong> <span id="patientAddress"></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img id="patientImage" src="" alt="Patient's Image" class="img-fluid" style="max-height: 150px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function showPatientDetails(patient) {
        document.getElementById('patientName').innerText = patient.name;
        document.getElementById('patientEmail').innerText = patient.email;
        document.getElementById('patientPhone').innerText = patient.phone;
        document.getElementById('patientGender').innerText = patient.gender;
        document.getElementById('patientDob').innerText = patient.dob;
        document.getElementById('patientMedicalHistory').innerText = patient.medical_history;
        document.getElementById('patientAddress').innerText = patient.address;

        // Use asset() for PHP to generate the image URL properly
        const imageUrl = patient.image ? '{{ asset('') }}' + patient.image : '{{ asset('images/default-image.jpg') }}';
        document.getElementById('patientImage').src = imageUrl;
    }
</script>
