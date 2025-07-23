@extends('admin.layouts.master')

@section('title')
Announcements |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Announcements List</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                        <a href="{{ route('announcements.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Add Announcement">
                            <i class="mdi mdi-library-plus"></i> Add Announcement
                        </a>
                    </div>
                </div>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center mb-4">
                        <h1>{{ settings()->website_name }}</h1>
                        <p>{{ settings()->address }}</p>
                        <p>{{ settings()->website_email }}</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table id="announcementsTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th>#</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($announcements as $announcement)
                                <tr class="text-center">
                                    <td>{{ $announcement->id }}</td>
                                    <td>{{ $announcement->news }}</td>
                                    <td>
                                        @if ($announcement->status == 'active')
                                            <span style="color: green;">Active</span>
                                        @else
                                            <span style="color: red;">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('announcements.show', $announcement->id) }}" class="btn btn-sm btn-success me-2" data-toggle="tooltip" title="View">
                                            <i class="mdi mdi-eye"></i>
                                        </a>

                                        <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" title="Edit">
                                            <i class="mdi mdi-grease-pencil"></i>
                                        </a>

                                        <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="mdi mdi-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="4">No announcements found.</td>
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
