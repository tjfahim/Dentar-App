@extends('admin.layouts.master')
@section('title')
    Edit Website Settings
@endsection
@section('content')
<div class="row mt-4 d-flex justify-content-center">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title text-center mb-0">Edit Website Settings</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('web.settings.update', $settings->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="website_name" class="form-label">Website Name</label>
                            <input type="text" name="website_name" id="website_name"
                                class="form-control border-info"
                                value="{{ old('website_name', $settings->website_name) }}"
                                placeholder="Enter Website Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="website_email" class="form-label">Website Email</label>
                            <input type="email" name="website_email" id="website_email"
                                class="form-control border-info"
                                value="{{ old('website_email', $settings->website_email) }}"
                                placeholder="Enter Website Email" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="website_logo" class="form-label">Website Logo</label>
                            <input type="file" name="website_logo" id="website_logo"
                                class="form-control border-info">
                            <small>Current Logo:</small><br>
                            <img src="{{ asset('storage/admin/' . $settings->website_logo) }}"
                                alt="Website Logo" class="img-thumbnail mt-2" style="max-width: 120px;">
                        </div>
                        <div class="col-md-6">
                            <label for="website_favicon" class="form-label">Website Favicon</label>
                            <input type="file" name="website_favicon" id="website_favicon"
                                class="form-control border-info">
                            <small>Current Favicon:</small><br>
                            <img src="{{ asset('storage/admin/' . $settings->website_favicon) }}"
                                alt="Website Favicon" class="img-thumbnail mt-2" style="max-width: 50px;">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address"
                                class="form-control border-info"
                                value="{{ old('address', $settings->address) }}"
                                placeholder="Enter Address">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone"
                                class="form-control border-info"
                                value="{{ old('phone', $settings->phone) }}"
                                placeholder="Enter Phone">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="api_url" class="form-label">API URL</label>
                            <input type="text" name="api_url" id="api_url"
                                class="form-control border-info"
                                value="{{ old('api_url', $settings->api_url) }}"
                                placeholder="Enter API URL">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary btn-sm shadow">
                            <i class="mdi mdi-content-save"></i> Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
