@extends('admin.layouts.master')

@section('title')
    Edit App Settings |
@endsection

@section('content')
<div class="row mt-4 d-flex justify-content-center">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <form action="{{ route('appSettingManage.update') }}" method="post" enctype="multipart/form-data">
                @csrf 
 @method('put')

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

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
                        <h4 class="card-title">Edit App Settings</h4>
                        <a href="{{ route('appSettingManage.edit') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Back to Settings"><i class="mdi mdi-step-backward"></i> Back to Settings</a>
                    </div>
                    <div class="row mt-5">
                        <div class="mt-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control border-info" value="{{ old('title', $record->title) }}" placeholder="Enter Title">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control border-info" placeholder="Enter Description">{{ old('description', $record->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="phoneimage">Phone Image</label>
                            <input type="file" name="phoneimage" class="form-control border-info">
                            @error('phoneimage')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @if($record->phoneimage)
                        <div class="mt-2">
                            <label>Current Phone Image</label>
                            <img src="{{ asset('storage/' . $record->phoneimage) }}" alt="Current Phone Image" style="width: 150px; height: auto;">
                        </div>
                        @endif
                        <div class="mt-2">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" name="phonenumber" class="form-control border-info" value="{{ old('phonenumber', $record->phonenumber) }}" placeholder="Enter Phone Number">
                            @error('phonenumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="emailimage">Email Image</label>
                            <input type="file" name="emailimage" class="form-control border-info">
                            @error('emailimage')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @if($record->emailimage)
                        <div class="mt-2">
                            <label>Current Email Image</label>
                            <img src="{{ asset('storage/' . $record->emailimage) }}" alt="Current Email Image" style="width: 150px; height: auto;">
                        </div>
                        @endif
                        <div class="mt-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control border-info" value="{{ old('email', $record->email) }}" placeholder="Enter Email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="locationimage">Location Image</label>
                            <input type="file" name="locationimage" class="form-control border-info">
                            @error('locationimage')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @if($record->locationimage)
                        <div class="mt-2">
                            <label>Current Location Image</label>
                            <img src="{{ asset('storage/' . $record->locationimage) }}" alt="Current Location Image" style="width: 150px; height: auto;">
                        </div>
                        @endif
                        <div class="mt-2">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control border-info" value="{{ old('location', $record->location) }}" placeholder="Enter Location">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="policy1title">Policy 1 Title</label>
                            <input type="text" name="policy1title" class="form-control border-info" value="{{ old('policy1title', $record->policy1title) }}" placeholder="Enter Policy 1 Title">
                            @error('policy1title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="policy1description">Policy 1 Description</label>
                            <textarea name="policy1description" class="form-control border-info" placeholder="Enter Policy 1 Description">{{ old('policy1description', $record->policy1description) }}</textarea>
                            @error('policy1description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="policy2title">Policy 2 Title</label>
                            <input type="text" name="policy2title" class="form-control border-info" value="{{ old('policy2title', $record->policy2title) }}" placeholder="Enter Policy 2 Title">
                            @error('policy2title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="policy2description">Policy 2 Description</label>
                            <textarea name="policy2description" class="form-control border-info" placeholder="Enter Policy 2 Description">{{ old('policy2description', $record->policy2description) }}</textarea>
                            @error('policy2description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-sm btn-info"><i class="mdi mdi-content-save"></i> Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
