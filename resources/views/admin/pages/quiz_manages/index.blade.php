@extends('admin.layouts.master')

@section('title')
    Quiz Management |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Quiz List</h4>
                    <div class="d-flex">
                        <a href="{{ route('quizManage.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Quiz"><i class="mdi mdi-library-plus"></i> Add Quiz</a>
                    </div>
                </div>
                <div class="table-responsive pt-3">
                    <table id="quizManageTable" class="table table-bordered">
                    <thead>
                        <tr class="text-center bg-info text-dark">
                            <th># Id</th>
                            <th>Quiz Title</th>
                            <th>Description</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                        @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <tbody>
                @forelse ($records as $quiz)
                <tr class="text-center">
                    <td>{{ $quiz->id }}</td>
                    <td>{{ $quiz->name }}</td>
                    <td>{{ $quiz->description }}</td>
                    <td>{{ $quiz->start_time }}</td>
                    <td>{{ $quiz->end_time }}</td>
                    <td>
                        @if ($quiz->status == 1)
                        Active
                        @else
                        <span style="color: red">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <!-- Action buttons as provided earlier -->
                    </td>
                </tr>
                @empty
                <tr class="text-center">
                    <td colspan="8">No data found</td>
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
