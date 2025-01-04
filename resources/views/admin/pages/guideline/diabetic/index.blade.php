@extends('admin.layouts.master')

@section('title')
Diabetic Guideline Manage |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Diabetic Guideline Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                        <a href="{{ route('diabetic.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Guideline">
                            <i class="mdi mdi-library-plus"></i> Add Diabetic Guide
                        </a>
                    </div>
                </div>

                <div class="table-responsive pt-3">
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

                        <tbody>
                            @forelse ($guidelines as $guide)
                            <tr class="text-center">
                                <td>{{ $guide->id }}</td>
                                <td>{{ $guide->title }}</td>
                                <td>{{ Str::limit($guide->description, 50) }}</td>
                                <td>
                                    @if ($guide->file)
                                        <a href="{{ asset($guide->file) }}" target="_blank">View File</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($guide->status == 1)
                                        <span style="color: green">Active</span>
                                    @else
                                        <span style="color: red">Inactive</span>
                                    @endif
                                </td>
                                <td class="action d-flex justify-content-center align-items-center">
                                    <a href="{{ route('diabetic.edit', $guide->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Diabetic Guide">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </a>

                                    <form action="{{ route('diabetic.destroy', $guide->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Diabetic Guide">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="6">No diabetic guides found</td>
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
