@extends('admin.layouts.master')
@section('title')
User Edit |
@endsection
@section('content')
<div class="row mt-4 d-flex justify-content-center">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <form action="{{ route('usersUpdate', $user->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
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
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">User Edit</h4>
                        <a href="{{ route('usersIndex') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Lists User"><i class="mdi mdi-step-backward"></i> Lists User</a>
                    </div>
                    <div class="row mt-5">
                        <div class="mt-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control border-info" value="{{ $user->name }}" placeholder="Enter Name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control border-info" value="{{ $user->email }}" placeholder="Enter Email" disabled>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control border-info" value="{{ $user->phone }}" placeholder="Enter Phone">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="profile_picture">Profile Picture</label>
                            <input type="file" name="profile_picture" class="form-control border-info">
                            @if($user->profile_picture)
                                <img src="{{ asset('/storage') }}/{{ $user->profile_picture }}" alt="profile picture" style="height: 200px; width: auto">
                            @endif
                            @error('profile_picture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- <div class="mt-2">
                            <label for="role" class="flex items-center space-x-2">
                                Role:
                                <select id="role" name="role" class="rounded-lg px-4 py-2 border border-gray-300 focus:outline-none">
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                            </label>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> -->
                        <div class="mt-2">
                            <label for="status" class="flex items-center space-x-2">
                                Status:
                                <select id="status" name="status" class="rounded-lg px-4 py-2 border border-gray-300 focus:outline-none">
                                    <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="block" {{ $user->status == 'block' ? 'selected' : '' }}>Block</option>
                                    <option value="suspend" {{ $user->status == 'suspend' ? 'selected' : '' }}>Suspend</option>
                                </select>
                            </label>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mt-5">
                            <h5>Change Password</h5>
                            <div class="mt-2">
                                <label for="current_password">Current Password</label>
                                <input type="password" name="current_password" class="form-control border-info" placeholder="Enter Current Password">
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label for="new_password">New Password</label>
                                <input type="password" name="new_password" class="form-control border-info" placeholder="Enter New Password">
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label for="new_password_confirmation">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control border-info" placeholder="Confirm New Password">
                                @error('new_password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-sm btn-info"><i class="mdi mdi-content-save "></i> Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
