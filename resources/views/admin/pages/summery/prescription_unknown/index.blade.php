@extends('admin.layouts.master')
@section('title')
Prescription Read Manage |
@endsection
@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Prescription Read Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                    </div>
                </div>

                <!-- Filter Form -->
                <form action="{{ route('prescription_reads.index') }}" method="GET" class="d-flex justify-content-end align-items-center mb-3 flex-wrap">
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
                    <table id="readsTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <!--<th>User Type</th>-->
                                <!--<th>User ID</th>-->
                                <!--<th>Files</th>-->
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <tbody id="readsTableBody">
                            @forelse ($prescription_unkown as $index => $read)
                            <tr class="text-center">
                                <td>{{ $index + 1  }}</td>
                                <td>{{ $read->title }}</td>
                                <td>{{ $read->description }}</td>
                                <td>{{ ucfirst($read->status) }}</td>
                                <!--<td>{{ $read->user_type }}</td>-->
                                <!--<td>{{ $read->user_id }}</td>-->
                                <!--<td>-->
                                <!--    @if($read->files)-->
                                <!--    <a href="{{ asset('storage/' . $read->files) }}" target="_blank" class="btn btn-sm btn-primary">View File</a>-->
                                <!--    @else-->
                                <!--    No file uploaded-->
                                <!--    @endif-->
                                <!--</td>-->
                                <td class="action d-flex justify-content-center align-items-center">
                                    <!-- Edit Button -->
                                    <a href="{{ route('prescription_unknown.show', $read->id) }}" class="btn btn-sm btn-info me-2" title="Edit Read">
                                        <i class="mdi mdi-eye"></i>
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('prescription_unknown.destroy', $read->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Read">
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
@endsection

<script>
    // Handle filter option changes
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
