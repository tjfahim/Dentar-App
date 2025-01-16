@extends('admin.layouts.master')
@section('title')
Custom Notification |
@endsection
@section('content')
<div class="row mt-4">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New Notification</h4>
                <form action="{{ route('notifications_system.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="filter">Send By</label>
                        <select class="custom-select custom-select-lg mb-3" name="option">
                            @foreach ($options as $index => $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        @error('filter')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter notification title">
                        @error('title')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" id="body" class="form-control" rows="4" placeholder="Enter notification body"></textarea>
                        @error('body')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Send Notification</button>
                        <a href="{{ route('notifications_system.index') }}" class="btn btn-secondary">Clear</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Notification List</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th># ID</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($notifications as $notification)
                            <tr class="text-center">
                                <td>{{ $notification->id }}</td>
                                <td>{{ $notification->title }}</td>
                                <td>{{ $notification->body }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <!-- View Button -->
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-success me-2"
                                        data-toggle="modal"
                                        data-target="#notificationModal"
                                        onclick="showNotificationDetails({{ $notification }})"
                                        title="View Notification">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                    <!-- Delete Form -->
                                    <form action="{{ route('notifications_system.destroy', $notification->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this notification?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Notification">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No notifications found</td>
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
<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="notificationModalLabel">Notification Details</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Title:</strong> <span id="notificationTitle"></span></p>
                <p><strong>Body:</strong> <span id="notificationBody"></span></p>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function showNotificationDetails(notification) {
        document.getElementById('notificationTitle').innerText = notification.title;
        document.getElementById('notificationBody').innerText = notification.body;
    }
</script>
