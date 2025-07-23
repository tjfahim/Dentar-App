@extends('admin.layouts.master')

@section('title')
    Prescription Details |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Prescription Read Details</h4>

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
                            <td>{{ $prescriptionRead->title }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $prescriptionRead->description }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ ucfirst($prescriptionRead->status) }}</td>
                        </tr>
                        <tr>
                            <th>Uploaded File</th>
                            <td>
                                @if($prescriptionRead->files)
                                    <a href="{{ asset('storage/' . $prescriptionRead->files) }}" target="_blank" class="btn btn-sm btn-primary">View File</a>
                                @else
                                    No file uploaded
                                @endif
                            </td>
                        </tr>
                    </table>

                    <!-- Actions -->
                    <a href="{{ route('prescription_reads.index') }}" class="btn btn-secondary mt-3">Back to List</a>
                    <!--<a href="{{ route('prescription_reads.edit', $prescriptionRead->id) }}" class="btn btn-info mt-3">Edit</a>-->
                    <form action="{{ route('prescription_reads.destroy', $prescriptionRead->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this prescription?')" class="d-inline-block mt-3">
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
