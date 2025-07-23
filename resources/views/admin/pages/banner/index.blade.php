@extends('admin.layouts.master')

@section('title')
Banner List |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                  @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Banners list</h4>
                    <a href="{{ route('banner.create') }}" class="btn btn-primary mb-3">Create New Banner</a>
                </div>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('storage/' . $banner->image) }}" alt="Banner Image" width="100" style="width: 400px; height: 300px; border-radius: 0px;"></td>
                                <td>
                                    <span class="badge" 
                                          style="background-color: {{ $banner->status ? 'green' : 'red' }}; color: white;">
                                        {{ $banner->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('banner.destroy', $banner->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {{ $banners->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
