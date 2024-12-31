@extends('admin.layouts.master')
@section('title')
    Website Settings
@endsection
@section('content')
<div class="row mt-4 d-flex justify-content-center">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title text-center mb-0">Website Settings</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Website Name</strong></td>
                            <td>{{ $settings->website_name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Website Email</strong></td>
                            <td>{{ $settings->website_email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Website Logo</strong></td>
                            <td>
                                <img src="{{ asset('storage/admin/' . $settings->website_logo) }}" alt="Website Logo"
                                class="img-fluid mb-2" style="min-width: 150px; height: auto;">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Website Favicon</strong></td>
                            <td>
                                <img src="{{ asset('storage/admin/' . $settings->website_favicon) }}" alt="Website Favicon"
                                        class="img-thumbnail" style="max-width: 50px; height: auto;">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Address</strong></td>
                            <td>{{ $settings->address }}</td>
                        </tr>
                        <tr>
                            <td><strong>Phone</strong></td>
                            <td>{{ $settings->phone }}</td>
                        </tr>
                        <tr>
                            <td><strong>API URL</strong></td>
                            <td><a href="{{ $settings->api_url }}" target="_blank">{{ $settings->api_url }}</a></td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('web.settings.edit', $settings->id) }}" class="btn btn-primary btn-sm shadow">
                        <i class="mdi mdi-pencil"></i> Edit Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
