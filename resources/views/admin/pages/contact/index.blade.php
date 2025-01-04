@extends('admin.layouts.master')

@section('title')
Contact Manage |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Contact Lists</h4>
                    <button type="button" class="btn btn-outline-info btn-sm btn-icon-text" onclick="printTable()">
                        <i class="mdi mdi-printer"></i>
                        Print
                    </button>
                </div>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{ settings()->website_name }}</h1>
                        <p class="mt-1">{{ settings()->address }}</p>
                        <p class="mt-1">{{ settings()->website_email }}</p>
                    </div>

                    <table id="contactTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th># ID</th>
                                <th> Name</th>
                                <th> User Info</th>
                                <th> Message</th>
                                <th> Action</th>
                                <th> Status</th>
                            </tr>
                        </thead>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <tbody id="contactTableBody">
                            @forelse ($contacts as $contact)
                            <tr class="text-center">
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->user_info }}</td>
                                <td>{{ $contact->message }}</td>
                                <td class="action d-flex justify-content-center align-items-center">
                                    <!-- View Contact Button -->
                                    <button type="button" class="btn btn-sm btn-info me-2" data-toggle="modal" data-target="#viewContactModal-{{ $contact->id }}" title="View Contact">
                                        <i class="mdi mdi-eye"></i>
                                    </button>

                                    <!-- Delete Contact Form -->
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Contact">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>

                                <td style="width: 200px">
                                    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')

                                        <select name="status" onchange="this.form.submit()" class="form-control form-control-sm {{ $contact->status ? 'text-success' : 'text-danger' }}" width="200px">
                                            <option value="0" {{ $contact->status == 0 ? 'selected' : '' }} class="text-danger">Pending</option>
                                            <option value="1" {{ $contact->status == 1 ? 'selected' : '' }} class="text-success">Resolved</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>

                            <!-- View Contact Modal -->
                            <div class="modal fade" id="viewContactModal-{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="viewContactModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewContactModalLabel">Contact Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Name:</strong> {{ $contact->name }}</p>
                                            <p><strong>User Info:</strong> {{ $contact->user_info }}</p>
                                            <p><strong>Message:</strong></p>
                                            <p>{{ $contact->message }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <tr class="text-center">
                                <td colspan="6">No contact found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4 d-flex justify-content-start">
                        {{ $contacts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
