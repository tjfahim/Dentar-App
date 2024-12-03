@extends('admin.layouts.master')

@section('title')
Slider Manage |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Slider Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                        <a href="{{ route('slider.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Slider"><i class="mdi mdi-library-plus"></i> Add Slider</a>
                    </div>
                </div>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{ settings()->website_name }}</h1>
                        <p class="mt-1">{{ settings()->address }}</p>
                        <p class="mt-1">{{ settings()->website_email }}</p>
                    </div>

                    <table id="sliderTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th> # Id</th>
                                <th> Title</th>
                                <th> Description</th>
                                <th> Image</th>
                                <th> Status</th>
                                <th> Action</th>
                            </tr>
                        </thead>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <tbody id="sliderTableBody">
                            @forelse ($sliders as $slider)
                            <tr class="text-center">
                                <td>{{ $slider->id }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ Str::limit($slider->description, 50) }}</td>
                                <td width="200" height='200' >
                                    <img src="{{ asset($slider->image) }}" style="{width: full, height: full}" alt="Slider Image" >
                                </td>
                                <td>
                                    @if ($slider->status == 1)
                                        <span style="color: green">Active</span>
                                    @elseif ($slider->status == 0)
                                        <span style="color: red">Inactive</span>
                                    @endif
                                </td>

                                <td class="action d-flex justify-content-center align-items-center">
                                    <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Slider"><i class="mdi mdi-grease-pencil"></i></a>

                                    <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Slider">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="6">No sliders found</td>
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
