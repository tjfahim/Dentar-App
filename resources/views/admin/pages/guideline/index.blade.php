@extends('admin.layouts.master')

@section('title')
National Guideline Manage |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">National Guideline Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                        <a href="{{ route('guideline.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Guideline">
                            <i class="mdi mdi-library-plus"></i> Add Guideline
                        </a>
                    </div>
                </div>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{ settings()->website_name }}</h1>
                        <p class="mt-1">{{ settings()->address }}</p>
                        <p class="mt-1">{{ settings()->website_email }}</p>
                    </div>

                    <table id="guidelineTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th> # Id</th>
                                <th> Title</th>
                                <th> Description</th>
                                <th> File</th>
                                <th> Status</th>
                                <th> Action</th>
                            </tr>
                        </thead>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <tbody id="guidelineTableBody">
                            @forelse ($guidelines as $guideline)
                            <tr class="text-center">
                                <td>{{ $guideline->id }}</td>
                                <td>{{ $guideline->title }}</td>
                                <td>{{ Str::limit($guideline->description, 50) }}</td>
                                <td>
                                    @if ($guideline->file)
                                        <a href="{{ asset($guideline->file) }}" target="_blank">View File</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($guideline->status == 1)
                                        <span style="color: green">Active</span>
                                    @elseif ($guideline->status == 0)
                                        <span style="color: red">Inactive</span>
                                    @endif
                                </td>

                                <td class="action d-flex justify-content-center align-items-center">
                                    <a href="{{ route('guideline.edit', $guideline->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Guideline">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </a>

                                    <form action="{{ route('guideline.destroy', $guideline->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Guideline">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="6">No guidelines found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-start">
                        {{ $guidelines->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
