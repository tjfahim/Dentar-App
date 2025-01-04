@extends('admin.layouts.master')

@section('title')
Feedback Manage |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Feedback Lists</h4>
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

                    <table id="feedbackTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th># ID</th>
                                <th> Name</th>
                                <th> Email</th>
                                <th> Description</th>
                                <th> Rating</th>
                                <th> Action</th>
                                <th> Status </th>
                            </tr>
                        </thead>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <tbody id="feedbackTableBody">
                            @forelse ($feedbacks as $feedback)
                            <tr class="text-center">
                                <td>{{ $feedback->id }}</td>
                                <td>{{ $feedback->name }}</td>
                                <td>{{ $feedback->email }}</td>
                                <td>{{ $feedback->description }}</td>
                                <td>{{ $feedback->rating }}</td>
                                <td class="action d-flex justify-content-center align-items-center">
                                    <!-- View Feedback Button -->
                                    <button type="button" class="btn btn-sm btn-info me-2" data-toggle="modal" data-target="#viewFeedbackModal-{{ $feedback->id }}" title="View Feedback">
                                        <i class="mdi mdi-eye"></i>
                                    </button>

                                    <!-- Delete Feedback Form -->
                                    <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this feedback?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Feedback">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>

                                    {{-- @if ($feedback->status == 1)
                                        <span style="color: green">Done</span>
                                    @elseif ($feedback->status == 0)
                                        <span style="color: red">Not replay</span>
                                    @endif --}}

                                <td style="width: 200px" >
                                    <form action="{{ route('feedback.update', $feedback->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')

                                        <select name="status" onchange="this.form.submit()" class="form-control form-control-sm {{ $feedback->status ? 'text-success' : 'text-danger' }}" width="200px">
                                            <option value="0" {{ $feedback->status == 0 ? 'selected' : '' }} class="text-danger" >Not Replayed</option>
                                            <option value="1" {{ $feedback->status == 1 ? 'selected' : '' }} class="text-success" >Done</option>
                                        </select>
                                    </form>
                                </td>

                            </tr>

                            <!-- View Feedback Modal -->
                            <div class="modal fade" id="viewFeedbackModal-{{ $feedback->id }}" tabindex="-1" role="dialog" aria-labelledby="viewFeedbackModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewFeedbackModalLabel">Feedback Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Name:</strong> {{ $feedback->name }}</p>
                                            <p><strong>Email:</strong> {{ $feedback->email }}</p>
                                            {{-- <p><strong>Subject:</strong> {{ $feedback->subject }}</p> --}}
                                            <p><strong>Message:</strong></p>
                                            <p>{{ $feedback->description }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <tr class="text-center">
                                <td colspan="6">No feedback found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4 d-flex justify-content-start">
                        {{ $feedbacks->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
