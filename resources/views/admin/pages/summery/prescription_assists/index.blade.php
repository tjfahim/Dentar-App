@extends('admin.layouts.master')
@section('title')
Prescription Assist Manage |
@endsection
@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Prescription Assist Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                    </div>
                </div>

                <!-- Filter Form -->
                <form action="{{ route('prescription_assists.index') }}" method="GET" class="d-flex justify-content-end align-items-center mb-3 flex-wrap">
                    <div class="form-group mx-2">
                        <label for="filter_option" class="form-label">Filter by</label>
                        <select class="form-control" id="filter_option" name="filter_option">
                            <option value="last_7_days" {{ request()->filter_option == 'last_7_days' ? 'selected' : '' }}>Last 7 Days</option>
                            <option value="last_30_days" {{ request()->filter_option == 'last_30_days' ? 'selected' : '' }}>Last 30 Days</option>
                            <option value="custom" {{ request()->filter_option == 'custom' ? 'selected' : '' }}>Custom Date Range</option>
                        </select>
                    </div>

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
                                <th>Title</th>
                                <th>Description</th>
                                <th>User ID</th>
                                <th>User Type</th>
                                <th>Replay User Type</th>
                                <th>Replay User ID</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <tbody id="usersTableBody">
                            @forelse ($prescription_assists as $index => $assist)
                            <tr class="text-center">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $assist->title }}</td>
                                <td>{{ $assist->description }}</td>
                                <td>{{ $assist->user_id }}</td>
                                <td>{{ $assist->userType }}</td>
                                <td>{{ $assist->replay_user_type }}</td>
                                <td>{{ $assist->replay_user_id }}</td>
                                <td class="action d-flex justify-content-center align-items-center">
                                    <!-- Show Button -->
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-success me-2"
                                        data-toggle="modal"
                                        data-target="#assistModal"
                                        onclick="showAssistDetails({{ $assist }})"
                                        title="View Assist">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                    <!-- Edit Button -->
                                    <a href="{{ route('prescription_assists.edit', $assist->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Assist">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('prescription_assists.destroy', $assist->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Assist">
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
<div class="modal fade" id="assistModal" tabindex="-1" aria-labelledby="assistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="assistModalLabel">Assist Details</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Title:</strong> <span id="assistTitle"></span></p>
                        <p><strong>Description:</strong> <span id="assistDescription"></span></p>
                        <p><strong>User ID:</strong> <span id="assistUserId"></span></p>
                        <p><strong>User Type:</strong> <span id="assistUserType"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Replay User Type:</strong> <span id="assistReplayUserType"></span></p>
                        <p><strong>Replay User ID:</strong> <span id="assistReplayUserId"></span></p>
                    </div>
                    <div class="col-md-12">
                        <p><strong>Image:</strong> <span id="assistImage"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function showAssistDetails(assistData) {
    document.getElementById('assistTitle').innerText = assistData.title;
    document.getElementById('assistDescription').innerText = assistData.description;
    document.getElementById('assistUserId').innerText = assistData.user_id;
    document.getElementById('assistUserType').innerText = assistData.userType;
    document.getElementById('assistReplayUserType').innerText = assistData.replay_user_type;
    document.getElementById('assistReplayUserId').innerText = assistData.replay_user_id;

    // Handle multiple images
    let fileContainer = document.getElementById('assistImage');
    fileContainer.innerHTML = ""; // Clear previous content

    let files = [];
    try {
        files = JSON.parse(assistData.image); // Corrected variable
    } catch (error) {
        console.error("Error parsing images:", error);
    }

    if (!Array.isArray(files)) {
        files = [files]; // Convert to array if it's a single file
    }

    // Filter out empty values and ensure it's an image file
    files = files.filter(file => file && file.trim() !== "" && file.match(/\.(jpeg|jpg|png|gif|webp)$/));
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
            startDateInput.style.opacity = '1';
            endDateInput.style.opacity = '1';
        } else {
            startDateInput.style.opacity = '0.3';
            endDateInput.style.opacity = '0.3';
        }
    });
</script>
