@extends('admin.layouts.master')

@section('title')
Role & Permission |
@endsection

@section('content')
<div class="container mt-4">
    <div class="main-card mb-3 card">
        <div class="card-header">Role Name
            <div class="btn-actions-pane-right">
                <div role="group" class="btn-group-sm btn-group">
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
                </div>
            </div>
        </div>
        <div class="">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="container mt-4">
                <form action="{{route('role.update', $role->id)}}" method="POST">
                    @csrf 
 @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif                <div class="form-group">
                        <input type="text" name="name" value="{{old('name', $role->name)}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Role Name">
                    </div>
                    <button type="submit" class="btn btn-primary mb-4">Update</button>

                    @if($permissions -> count() > 0)
                    <div class="row">
                        @foreach($permissions as $permission)
                        <div class="col-md-3 mb-1">
                            <div class="form-check">
                                <input {{($hasPermissions->contains($permission->name) ? "checked" : "") }} type="checkbox" name="permission[]" id="permission-{{ $permission->id }}" value="{{ $permission->name }}" class="form-check-input">
                                <label class="form-check-label" for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>

@endsection