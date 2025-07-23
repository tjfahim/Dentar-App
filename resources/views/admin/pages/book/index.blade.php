@extends('admin.layouts.master')

@section('title')
Book Manage |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Book Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                        <a href="{{ route('book.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Book"><i class="mdi mdi-library-plus"></i> Add Book</a>
                    </div>
                </div>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{ settings()->website_name }}</h1>
                        <p class="mt-1">{{ settings()->address }}</p>
                        <p class="mt-1">{{ settings()->website_email }}</p>
                    </div>

                    <table id="bookTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th> #</th>
                                <th> Title</th>
                                <th> Description</th>
                                <th> Image</th>
                                <th> PDF</th>
                                <th> Status</th>
                                <th> Action</th>
                            </tr>
                        </thead>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <tbody id="bookTableBody">
                            @forelse ($books as $index => $book)
                            <tr class="text-center">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ Str::limit($book->description, 50) }}</td>
                                <td width="200" height='200'>
                                    <img src="{{ asset($book->image) }}" style="width: 100%; height: 100%; border-radius: 0%;" alt="Book Image">
                                </td>
                                <td>
                                    @if ($book->pdf)
                                        <a href="{{ asset($book->pdf) }}" target="_blank">View PDF</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($book->status == 'active')
                                        <span style="color: green">Active</span>
                                    @elseif ($book->status == 'inactive')
                                        <span style="color: red">Inactive</span>
                                    @endif
                                </td>

                                <td class="action d-flex justify-content-center align-items-center">
                                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Book"><i class="mdi mdi-grease-pencil"></i></a>

                                    <form action="{{ route('book.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Book">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="7">No books found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-start">
                        {{ $books->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
