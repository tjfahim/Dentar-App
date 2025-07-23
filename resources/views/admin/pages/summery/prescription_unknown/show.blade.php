@extends('admin.layouts.master')

@section('title')
    Prescription Unknown |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Prescription Unknown Details</h4>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{ settings()->website_name }}</h1>
                        <p class="mt-1">{{ settings()->address }}</p>
                        <p class="mt-1">{{ settings()->website_email }}</p>
                    </div>

                    <!-- Prescription Details -->
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>{{ $prescriptionunknown->title }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $prescriptionunknown->description }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ ucfirst($prescriptionunknown->status) }}</td>
                        </tr>
                        <tr>
                            <th>Uploaded File</th>
                            <td>
                                @if($prescriptionunknown->files)
                                  @php
                                            $filesData = $prescriptionunknown->files;

                                            // Try to decode JSON
                                            $decoded = json_decode($filesData, true);
                                        @endphp

                                        @if (is_array($decoded))
                                            {{-- Case: JSON array --}}
                                            @foreach($decoded as $file)
                                                <a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-sm btn-primary mb-1">View File</a>
                                            @endforeach
                                        @elseif (is_string($filesData) && file_exists(public_path('storage/' . $filesData)))
                                            {{-- Case: Single string file --}}
                                            <a href="{{ asset('storage/' . $filesData) }}" target="_blank" class="btn btn-sm btn-primary">View File</a>
                                        @else
                                            <p>No valid file found.</p>
                                        @endif

                                @else
                                    No file uploaded
                                @endif
                            </td>
                        </tr>
                    </table>

                    <!-- Actions -->
                    <a href="{{ route('prescription_unknown.index') }}" class="btn btn-secondary mt-3">Back to List</a>
                    <!--<a href="{{ route('prescription_unknown.edit', $prescriptionunknown->id) }}" class="btn btn-info mt-3">Edit</a>-->
                    <form action="{{ route('prescription_unknown.destroy', $prescriptionunknown->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this prescription?')" class="d-inline-block mt-3">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
