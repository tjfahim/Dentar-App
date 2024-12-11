@extends('admin.layouts.master')

@section('title')
    Quiz Question Management |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Quiz Questions List</h4>
                    
                    <div class="d-flex">
                        <a href="{{ route('quizQuestionManage.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Question"><i class="mdi mdi-library-plus"></i> Add Question</a>
                    </div>
                </div>
                <div class="table-responsive pt-3">
                    <table id="quizQuestionTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th># Id</th>
                                <th>Quiz</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Points</th>
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
                            @forelse ($records as $question)
                            <tr class="text-center">
                                <td>{{ $question->id }}</td>
                                <td>{{ $question->quizManage->name ?? null }}</td>
                                <td>{{ $question->question }}</td>
                                <td>{{ $question->answer }}</td>
                                <td>{{ $question->points }}</td>
                                <td>
                                    @if ($question->status == 1)
                                    Active
                                    @else
                                    <span style="color: red">Inactive</span>
                                    @endif
                                </td>
                                <td class="">
                                    <div class="action-buttons">
                                        <a href="{{ route('quizQuestionManage.edit', $question->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Question"><i class="mdi mdi-grease-pencil"></i></a>

                                        <form action="{{ route('quizQuestionManage.destroy', $question->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="d-inline">
                                            @csrf 
                                            @if ($errors->any())
                                                <div class="alert alert-danger" role="alert">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif                                     
                                             @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Question">
                                                <i class="mdi mdi-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
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
