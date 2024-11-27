@extends('admin.layouts.master')
@section('title')
	Change Password |
@endsection
@section('content')
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('user.settingsChangeUserPassword', Auth::user()->id) }}" method="post">
                    @csrf 
 @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif                @method('put')
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Change Password</h4>
                            <!-- <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#passwordModal">Change Password</button> -->
                        </div>

                        <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">

                        <div class="row">
                            <div class="mt-2">
                                <label for="current_password">Current Password</label>
                                <input type="text" name="current_password" class="form-control border-info" placeholder="Enter current password" required>
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="new_password">New Password</label>
                                <input type="text" name="new_password" class="form-control border-info" placeholder="Enter new password" required>
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="text" name="confirm_password" class="form-control border-info" placeholder="Enter confirm password" required>
                                @error('confirm_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-sm btn-info"><i
                                            class="mdi mdi-content-save "></i> Update Password</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
