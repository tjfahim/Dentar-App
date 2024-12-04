@extends('admin.layouts.master')

@section('title')
Job Manage |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Job Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                        <a href="{{ route('job.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Job"><i class="mdi mdi-library-plus"></i> Add Job</a>
                    </div>
                </div>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{ settings()->website_name }}</h1>
                        <p class="mt-1">{{ settings()->address }}</p>
                        <p class="mt-1">{{ settings()->website_email }}</p>
                    </div>

                    <table id="jobTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th> # Id</th>
                                <th> Title</th>
                                <th> Description</th>
                                <th> Company</th>
                                <th> Job Deadline</th>
                                <th> Status</th>
                                <th> Action</th>
                            </tr>
                        </thead>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <tbody id="jobTableBody">
                            @forelse ($jobs as $job)
                            <tr class="text-center">
                                <td>{{ $job->id }}</td>
                                <td>{{ $job->title }}</td>
                                <td>{{ Str::limit($job->description, 50) }}</td>
                                <td>{{ $job->company_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($job->job_deadline)->format('d M, Y') }}</td>
                                <td>
                                    @if ($job->status == 'active')
                                        <span style="color: green">Active</span>
                                    @else
                                        <span style="color: red">Inactive</span>
                                    @endif
                                </td>

                                <td class="action d-flex justify-content-center align-items-center">
                                    <a href="{{ route('job.edit', $job->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Job"><i class="mdi mdi-grease-pencil"></i></a>

                                    <form action="{{ route('job.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Job">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="7">No jobs found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-start">
                        {{ $jobs->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
