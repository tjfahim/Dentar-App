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
                    <h4 class="card-title">Diagnostic  Case Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                    </div>
                </div>

                <!-- Filter Form -->
                <form action="{{ route('diagnostic_case.index') }}" method="GET" class="d-flex justify-content-end align-items-center mb-3 flex-wrap">
                    <div class="form-group mx-2">
                        <label for="filter_option" class="form-label">Filter by</label>
                        <select class="form-control" id="filter_option" name="filter_option">
                            <option value="last_7_days" {{ request()->filter_option == 'last_7_days' ? 'selected' : '' }}>Last 7 Days</option>
                            <option value="last_30_days" {{ request()->filter_option == 'last_30_days' ? 'selected' : '' }}>Last 30 Days</option>
                            <option value="custom" {{ request()->filter_option == 'custom' ? 'selected' : '' }}>Custom Date Range</option>
                        </select>
                    </div>

                    <!-- Custom Date Range Inputs (Always visible, opacity changes based on selection) -->
                    <div class="form-group mx-2">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request()->start_date }}" style="opacity: {{ request()->filter_option == 'custom' ? '1' : '0.3' }};">
                    </div>
                    <div class="form-group mx-2">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request()->end_date }}" style="opacity: {{ request()->filter_option == 'custom' ? '1' : '0.3' }};">
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm mt-2 mt-md-0">Apply Filter</button>
                </form>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{ settings()->website_name }}</h1>
                        <p class="mt-1">{{ settings()->address }}</p>
                        <p class="mt-1">{{ settings()->website_email }}</p>
                    </div>
                    <table id="usersTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th>#</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Number</th>
                                <th>Problem Title</th>
                                <th>Patient Type</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <tbody id="usersTableBody">
                            @forelse ($diagnostic_cases as $index =>  $case)
                            <tr class="text-center">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $case->name }}</td>
                                <td>{{ $case->age }}</td>
                                <td>{{ $case->gender }}</td>
                                <td>{{ $case->number }}</td>
                                <td>{{ $case->problem_title }}</td>
                                <td>{{ $case->patient_type }}</td>
                                <td class="action d-flex justify-content-center align-items-center">
                                    <!-- Show Button -->
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-success me-2"
                                        data-toggle="modal"
                                        data-target="#caseModal"
                                        onclick="showCaseDetails({{ $case }})"
                                        title="View Case">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                    <!-- Edit Button -->
                                    <a href="{{ route('diagnostic_case.edit', $case->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Case">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('diagnostic_case.destroy', $case->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Case">
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
<div class="modal fade" id="caseModal" tabindex="-1" aria-labelledby="caseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="caseModalLabel">Case Details</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> <span id="caseName"></span></p>
                        <p><strong>Age:</strong> <span id="caseAge"></span></p>
                        <p><strong>Gender:</strong> <span id="caseGender"></span></p>
                        <p><strong>Number:</strong> <span id="caseNumber"></span></p>
                        <p><strong>Problem Title:</strong> <span id="caseProblemTitle"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Problem:</strong> <span id="caseProblem"></span></p>
                        <p><strong>Patient Type:</strong> <span id="caseType"></span></p>
                        <p><strong>Patient ID:</strong> <span id="casePatientId"></span></p>
                        <p><strong>Doctor ID:</strong> <span id="caseDoctorId"></span></p>
                    </div>
                    <div class="col-12">
                        <p><strong>File:</strong> <span id="caseFile"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
   function showCaseDetails(caseData) {
    document.getElementById('caseName').innerText = caseData.name;
    document.getElementById('caseAge').innerText = caseData.age;
    document.getElementById('caseGender').innerText = caseData.gender;
    document.getElementById('caseNumber').innerText = caseData.number;
    document.getElementById('caseProblemTitle').innerText = caseData.problem_title;
    document.getElementById('caseProblem').innerText = caseData.problem;
    document.getElementById('caseType').innerText = caseData.patient_type;
    document.getElementById('casePatientId').innerText = caseData.patient_id;
    document.getElementById('caseDoctorId').innerText = caseData.doctor_id;
    
    

    // Handle multiple images
    let fileContainer = document.getElementById('caseFile');
    fileContainer.innerHTML = ""; // Clear previous content

    let files = JSON.parse(caseData.file);
    

    if (!Array.isArray(files)) {
        files = [files]; // Convert to array if it's a single file
        console.log(files);
    }

    // Filter out empty values and check for image formats
    files = files.filter(file => file && file.trim() !== "" && file.match(/\.(jpeg|jpg|png|gif)$/));
    const baseUrl = "{{ asset('') }}";

    if (files.length > 0) {
        files.forEach(file => {
            let imgElement = `<img src="${baseUrl}/${file}" alt="Case Image" class="img-thumbnail m-1" width="100">`;
            fileContainer.innerHTML += imgElement;
        });
    } else {
        fileContainer.innerHTML = "No image uploaded";
    }
}



    // Event listener for changing filter option
    document.getElementById('filter_option').addEventListener('change', function () {
        var filterOption = this.value;
        var startDateInput = document.getElementById('start_date');
        var endDateInput = document.getElementById('end_date');

        if (filterOption === 'custom') {
            // Set opacity to 100% when custom date range is selected
            startDateInput.style.opacity = '1';
            endDateInput.style.opacity = '1';
        } else {
            // Set opacity to 30% when other options are selected
            startDateInput.style.opacity = '0.3';
            endDateInput.style.opacity = '0.3';
        }
    });
</script>
