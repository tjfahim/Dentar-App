@extends('admin.layouts.master')

@section('title')
District Address Manage |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">District Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createDistrictModal">
                            <i class="mdi mdi-library-plus"></i> Add District
                        </button>
                    </div>
                </div>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{ settings()->website_name }}</h1>
                        <p class="mt-1">{{ settings()->address }}</p>
                        <p class="mt-1">{{ settings()->website_email }}</p>
                    </div>

                    <table id="addressTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th> #</th>
                                <th> Name (English)</th>
                                <th> Name (Bangla)</th>
                                <th> Action</th>
                            </tr>
                        </thead>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <tbody id="addressTableBody">
                            @forelse ($addresses as $address)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $address->name }}</td>
                                <td>{{ $address->name_bn }}</td>

                                <td class="action d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn btn-sm btn-info me-2" data-toggle="modal" data-target="#editDistrictModal{{ $address->id }}">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </button>

                                    <form action="{{ route('master.addresses.destroy', $address->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete District">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Edit Modal -->
<div class="modal fade" id="editDistrictModal{{ $address->id }}" tabindex="-1" role="dialog" aria-labelledby="editDistrictModalLabel{{ $address->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('master.addresses.update', $address->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDistrictModalLabel{{ $address->id }}">Edit District</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">District Name (English)</label>
                    <input type="text" class="form-control" name="name" value="{{ $address->name }}" required>
                </div>
                <div class="form-group">
                    <label for="name_bn">District Name (Bangla)</label>
                    <input type="text" class="form-control" name="name_bn" value="{{ $address->name_bn }}" required>
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
                                <td colspan="4">No districts found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Create District Modal -->
<div class="modal fade" id="createDistrictModal" tabindex="-1" role="dialog" aria-labelledby="createDistrictModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('master.addresses.store') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDistrictModalLabel">Add District</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">District Name (English)</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="name_bn">District Name (Bangla)</label>
                    <input type="text" class="form-control" name="name_bn" required>
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

<script>

    new DataTable('#addressTable')
</script>

@endsection
