@extends('admin.layouts.master')
@section('title')
	Settings |
@endsection
@section('content')
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
                <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                            type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">Profile
                            Settings</button>
                    </li>
                    @if(Auth::user()->designation == 'admin')
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="website-tab" data-bs-toggle="tab" data-bs-target="#website-tab-pane"
                            type="button" role="tab" aria-controls="website-tab-pane" aria-selected="true">Website Settings</button>
                    </li>
                    @endif
                </ul>
                <div class="tab-content" id="myTabContent">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">
                        <form action="{{ route('usersUpdate', $user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf 
 @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif                        @method('put')
                            <div class="card-body">

                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">Profile Settings</h4>
                                </div>


                                <div class="row">
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
                                        <input type="number" name="phone" class="form-control border-info" value="{{ $user->phone }}" placeholder="Enter Phone">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label for="present_address">Present Address</label>
                                        <input type="text" name="present_address" class="form-control border-info" value="{{ $user->present_address }}" placeholder="Enter Present Address">
                                        @error('present_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label for="permanent_address">Permanent Address</label>
                                        <input type="text" name="permanent_address" class="form-control border-info" value="{{ $user->permanent_address }}" placeholder="Enter Permanent Address">
                                        @error('permanent_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control border-info">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if(Auth::user()->id != $user->id)
                                    <div class="mt-2">
                                        <label for="designation" class="flex items-center space-x-2">
                                            Designation:
                                            <select id="designation" name="designation" class="rounded-lg px-4 py-2 border border-gray-300 focus:outline-none">
                                                <option value="admin" {{ old('designation', $user->designation) == 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>
                                        </label>
                                        @error('designation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @endif
                                    <div class="mt-2">
                                        <label for="location">Location</label>
                                        <input type="text" name="location" class="form-control border-info" value="{{ $user->location }}" placeholder="Enter Location">
                                        @error('location')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label for="signature">Signature</label>
                                        <input type="file" name="signature" class="form-control border-info">
                                        @error('signature')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label for="password">Password</label>
                                        <input type="text" name="password" class="form-control border-info" placeholder="Enter Password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if(Auth::user()->id != $user->id)
                                    <div class="mt-2">
                                        <label for="status" class="flex items-center space-x-2">
                                            Status:
                                            <select id="status" name="status" class="rounded-lg px-4 py-2 border border-gray-300 focus:outline-none">
                                                <option value="1" {{ old('status', $user->status) == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : '' }}>Pending</option>
                                            </select>
                                        </label>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex justify-content-end mt-4">
                                            <button type="submit" class="btn btn-sm btn-info"><i
                                                    class="mdi mdi-content-save "></i> Update Profile</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    @if(Auth::user()->designation == 'admin')
                    <div class="tab-pane fade show" id="website-tab-pane" role="tabpanel" aria-labelledby="website-tab"
                        tabindex="0">
                        <form action="{{route('settings.update', $settings->id)}}" method="post" enctype="multipart/form-data">
                            @csrf 
 @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif                        @method('put')
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">General Settings</h4>
                                </div>

                                <div class="row">

                                    <div class="col">
                                        <input type="text" name="website_name" value="{{$settings->website_name ?? ''}}" class="form-control border-info  @error('website_name') is-invalid @enderror"
                                            placeholder="Website Name..." data-toggle="tooltip" data-placement="right"
                                            title="Website Name" required>
                                    </div>
                                    <div class="col">
                                        <input type="email" name="website_email" class="form-control border-info bg-transparent  @error('website_email') is-invalid @enderror"
                                            placeholder="Website Name" data-toggle="tooltip" data-placement="right"
                                            title="Website Email" value="{{$settings->website_email ?? ''}}"  required>
                                    </div>

                                </div>
                                <div class="row mt-4">

                                    <div class="col">
                                        <input type="text" name="address" value="{{$settings->address ?? ''}}" class="form-control border-info  @error('address') is-invalid @enderror"
                                            placeholder="Address..." data-toggle="tooltip" data-placement="right"
                                            title="Address">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="phone" class="form-control border-info bg-transparent  @error('phone') is-invalid @enderror"
                                            placeholder="Phone..." data-toggle="tooltip" data-placement="right"
                                            title="Phone" value="{{$settings->phone ?? ''}}"  >
                                    </div>

                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <input type="file" name="website_logo" class="form-control border-info  @error('website_logo') is-invalid @enderror" accept="image/*"
                                            data-toggle="tooltip" data-placement="right"
                                            title="Website Logo" max="10">

                                    </div>
                                    <div class="col">
                                        <input type="file" name="website_favicon" class="form-control border-info  @error('website_favicon') is-invalid @enderror" accept="image/*"
                                            data-toggle="tooltip" data-placement="right"
                                            title="Website Favicon" >

                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                     <small> Existing Logo: </small> <br>
                                        <img src="{{asset('storage/admin')}}/{{$settings->website_logo ?? ''}}" alt="Website Logo"  class="w-50 mt-1">
                                    </div>
                                    <div class="col">
                                      <small>Existing Favicon: </small><br>
                                        <img src="{{asset('storage/admin')}}/{{$settings->website_favicon ?? ''}}" alt="Website Favicon" class="w-50 mt-1">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <input type="text" name="api_url" class="form-control border-info bg-transparent  @error('api_url') is-invalid @enderror"
                                            placeholder="API Url.." data-toggle="tooltip" data-placement="right"
                                            title="API URL" value="{{$settings->api_url ?? ''}}"  >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex justify-content-end mt-2">
                                            <button type="submit" class="btn btn-sm btn-info"><i
                                                    class="mdi mdi-content-save "></i> Update Settings</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route('user-password.update')}}" method="post">
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
                        <div class="row mt-4">
                            <div class="col">
                                <input type="password" name="current_password" class="form-control border-info  @error('current_password') is-invalid @enderror"
                                    placeholder="Current Password..." data-toggle="tooltip" data-placement="right"
                                    title="Current Password" required>
                            </div>
                            <div class="col">
                                <input type="password" name="password" class="form-control border-info  @error('password') is-invalid @enderror"
                                    placeholder="New Password..." data-toggle="tooltip" data-placement="right"
                                    title="New Password" required>
                            </div>
                            <div class="col">
                                <input type="password" name="password_confirmation" class="form-control border-info  @error('password_confirmation') is-invalid @enderror"
                                    placeholder="Confirm Password..." data-toggle="tooltip" data-placement="right"
                                    title="Confirm Password" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        </div>
    </div>
@endsection
