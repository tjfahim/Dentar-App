@extends('admin.layouts.master')

@section('title')
Teenager Help Guide Management |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Teenager Help Guides</h4>
                    <div class="d-flex">
                        <a href="{{ route('teenager.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Teenager Guide">
                            <i class="mdi mdi-library-plus"></i> Add Guide
                        </a>
                    </div>
                </div>

                <div class="table-responsive pt-3">
                     @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <table id="teenagerTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>File</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($teenagers as $teenager)
                                <tr class="text-center">
                                    <td>{{ $teenager->id }}</td>
                                    <td>{{ $teenager->title }}</td>
                                    <td>{{ Str::limit($teenager->description, 50) }}</td>
                                    <td>
                                        @if ($teenager->file)
                                            <a href="{{ asset($teenager->file) }}" target="_blank">View File</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if ($teenager->status == 1)
                                            <span style="color: green">Active</span>
                                        @else
                                            <span style="color: red">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="action d-flex justify-content-center">
                                        <a href="{{ route('teenager.edit', $teenager->id) }}" class="btn btn-sm btn-info me-2" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <form action="{{ route('teenager.destroy', $teenager->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?')" class="mb-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $teenagers->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
