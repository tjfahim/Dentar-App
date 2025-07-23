@extends('admin.layouts.master')

@section('title')
Hospital Manage |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Hospital Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createHospitalModal">
                            <i class="mdi mdi-library-plus"></i> Add Hospital
                        </button>
                    </div>
                </div>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{ settings()->website_name }}</h1>
                        <p class="mt-1">{{ settings()->address }}</p>
                        <p class="mt-1">{{ settings()->website_email }}</p>
                    </div>

                    <table id="hospitalTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th>#</th>
                                <th>Hospital Name</th>
                                <th>District</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <tbody>
                            @forelse ($hospitals as $hospital)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $hospital->name }}</td>
                                <td>{{ $hospital->district?->name ?? 'N/A' }}</td>

                                <td class="action d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn btn-sm btn-info me-2" data-toggle="modal" data-target="#editHospitalModal{{ $hospital->id }}">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </button>

                                    <form action="{{ route('master.hospitals.destroy', $hospital->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Hospital">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editHospitalModal{{ $hospital->id }}" tabindex="-1" role="dialog" aria-labelledby="editHospitalLabel{{ $hospital->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('master.hospitals.update', $hospital->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Hospital</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Hospital Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $hospital->name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>District</label>
                                                    <select name="district_id" class="form-control" required>
                                                        <option value="">Select District</option>
                                                        @foreach($districts as $district)
                                                            <option value="{{ $district->id }}" {{ $hospital->district_id == $district->id ? 'selected' : '' }}>
                                                                {{ $district->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            @empty
                            <tr class="text-center">
                                <td colspan="4">No hospitals found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createHospitalModal" tabindex="-1" role="dialog" aria-labelledby="createHospitalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('master.hospitals.store') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Hospital</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Hospital Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label>District</label>
                    <select name="district_id" class="form-control" required>
                        <option value="">Select District</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </div>
    </form>
  </div>
</div>



@endsection
