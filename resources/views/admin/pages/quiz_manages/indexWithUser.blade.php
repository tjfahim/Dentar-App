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
                    <h4 class="card-title">Quiz set List</h4>
                    <div class="d-flex">
                        <a href="{{ route('quizManage.createwithuser') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Quiz"><i class="mdi mdi-library-plus"></i> Add Quiz set</a>
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
                    <td>{{  \Carbon\Carbon::parse($quiz->start_time)->format('d F Y  h:i A') }}</td>
                    <td>{{  \Carbon\Carbon::parse($quiz->end_time)->format('d F Y  h:i A') }}</td>
                    <td>
                        @if ($quiz->status == 1)
                        Active
                        @else
                        <span style="color: red">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                                        <a href="{{ route('quizManage.editWithUser', $quiz->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Question"><i class="mdi mdi-grease-pencil"></i></a>

                                        <form action="{{ route('quizManage.destroy', $quiz->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="d-inline">
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
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
  
        
               <form action="{{ route('leaderboard.update') }}" method="post" class="p-4 rounded shadow-sm bg-white">
                   @csrf
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title text-primary mb-0">🎯 Quiz Leaderboard</h4>
                    </div>
                
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="quiz_manage_id" class="form-label fw-bold">Select Quiz</label>
                            <select id="quiz_manage_id" name="quiz_manage_id" class="form-select border-primary">
                                <option value="none">-- Select Quiz --</option>
                                @foreach($records as $quiz)
                                    <option value="{{ $quiz->id }}" {{ $quiz->leaderboard == 'active' ? 'selected' : '' }}>
                                        {{ $quiz->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('quiz_manage_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary btn-lg px-4">
                            <i class="mdi mdi-content-save me-2"></i> Save
                        </button>
                    </div>
                </form>

        
        
            </div>
        </div>
    </div>
</div>
@endsection
