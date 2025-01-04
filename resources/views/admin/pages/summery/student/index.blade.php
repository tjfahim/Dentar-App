@extends('admin.layouts.master')
@section('title')
Student Manage |
@endsection
@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Student Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                        <a href="{{ route('student.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Student">
                            <i class="mdi mdi-library-plus"></i> Add Student
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
                                <th>University</th>
                                <th>Specialization</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <tbody id="usersTableBody">
                            @forelse ($students as $student)
                            <tr class="text-center">
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->university }}</td>
                                <td>{{ $student->specialization }}</td>

                                <td class="action d-flex justify-content-center align-items-center">
                                    <!-- Show Button -->
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-success me-2"
                                        data-toggle="modal"
                                        data-target="#studentModal"
                                        onclick="showStudentDetails({{ $student }})"
                                        title="View Student">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                    <!-- Edit Button -->
                                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Student">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Student">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="8">No data found</td>
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
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="studentModalLabel">Student Details</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> <span id="studentName"></span></p>
                        <p><strong>Email:</strong> <span id="studentEmail"></span></p>
                        <p><strong>Phone:</strong> <span id="studentPhone"></span></p>
                        <p><strong>Gender:</strong> <span id="studentGender"></span></p>
                        <p><strong>Date of Birth:</strong> <span id="studentDob"></span></p>
                        <p><strong>University:</strong> <span id="studentUniversity"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Year:</strong> <span id="studentYear"></span></p>
                        <p><strong>Specialization:</strong> <span id="studentSpecialization"></span></p>
                        <p><strong>Address:</strong> <span id="studentAddress"></span></p>
                        <p><strong>Occupation:</strong> <span id="studentOccupation"></span></p>
                        <p><strong>Organization:</strong> <span id="studentOrganization"></span></p>
                        <p><strong>Bio:</strong> <span id="studentBio"></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img id="studentImage" src="" alt="Student's Image" class="img-fluid" style="max-height: 150px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function showStudentDetails(student) {
        document.getElementById('studentName').innerText = student.name;
        document.getElementById('studentEmail').innerText = student.email;
        document.getElementById('studentPhone').innerText = student.phone;
        document.getElementById('studentGender').innerText = student.gender;
        document.getElementById('studentDob').innerText = student.dob;
        document.getElementById('studentUniversity').innerText = student.university;
        document.getElementById('studentYear').innerText = student.year;
        document.getElementById('studentSpecialization').innerText = student.specialization;
        document.getElementById('studentAddress').innerText = student.address;
        document.getElementById('studentOccupation').innerText = student.occupation;
        document.getElementById('studentOrganization').innerText = student.organization;
        document.getElementById('studentBio').innerText = student.bio;

        // Use asset() for PHP to generate the image URL properly
        const imageUrl = student.image ? '{{ asset('') }}' + student.image : '{{ asset('images/default-image.jpg') }}';
        document.getElementById('studentImage').src = imageUrl;
    }
</script>

