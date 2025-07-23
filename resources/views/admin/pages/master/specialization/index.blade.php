@extends('admin.layouts.master')

@section('title')
Doctor Specialties Manage |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Doctor Specialties List</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i> Print
                        </button>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createSpecialtyModal">
                            <i class="mdi mdi-library-plus"></i> Add Specialty
                        </button>
                    </div>
                </div>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{ settings()->website_name }}</h1>
                        <p class="mt-1">{{ settings()->address }}</p>
                        <p class="mt-1">{{ settings()->website_email }}</p>
                    </div>

                    <table id="specialtyTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th>#</th>
                                <th>Specialty Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <tbody>
                            @forelse ($specialties as $specialty)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $specialty->name }}</td>
                                <td class="action d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn btn-sm btn-info me-2" data-toggle="modal" data-target="#editSpecialtyModal{{ $specialty->id }}">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </button>

                                    <form action="{{ route('master.specializations.destroy', $specialty->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="mb-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Specialty">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editSpecialtyModal{{ $specialty->id }}" tabindex="-1" role="dialog" aria-labelledby="editSpecialtyLabel{{ $specialty->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('master.specializations.update', $specialty->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Specialty</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Specialty Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $specialty->name }}" required>
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
                                <td colspan="3">No specialties found</td>
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
<div class="modal fade" id="createSpecialtyModal" tabindex="-1" role="dialog" aria-labelledby="createSpecialtyLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('master.specializations.store') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Specialty</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Specialty Name</label>
                    <input type="text" class="form-control" name="name" required>
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
