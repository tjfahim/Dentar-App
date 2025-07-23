@extends('admin.layouts.master')

@section('title')
Blog Manage |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Blog Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                        <a href="{{ route('blog_manage.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Blog">
                            <i class="mdi mdi-library-plus"></i> Add Blog
                        </a>
                    </div>
                </div>

                <div class="table-responsive pt-3">
                    <table id="blogTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th> #</th>
                                <th> Title</th>
                                <th> Content</th>
                                <!--<th> File</th>-->
                                <th> Status</th>
                                <th> Action</th>
                            </tr>
                        </thead>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <tbody id="blogTableBody">
                            @forelse ($blogs as $index => $blog)
                            <tr class="text-center">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ Str::limit($blog->content, 50) }}</td>
                                <!--<td>-->
                                <!--    @if ($blog->file)-->
                                <!--        <a href="{{ asset($blog->file) }}" target="_blank">View File</a>-->
                                <!--    @else-->
                                <!--        N/A-->
                                <!--    @endif-->
                                <!--</td>-->
                                <td>
                                    @if ($blog->status == '1')
                                        <span style="color: green">Active</span>
                                    @elseif ($blog->status == '0')
                                        <span style="color: red">Inactive</span>
                                    @endif
                                </td>

                                <td class="action d-flex justify-content-center align-items-center">
                                     <a href="{{ route('blog_manage.show', $blog->id) }}" class="btn btn-sm btn-success me-2" title="View Blog">
                                        <i class="mdi mdi-eye"></i>
                                    </a>
                                    <a href="{{ route('blog_manage.edit', $blog->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Blog">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </a>

                                    <form action="{{ route('blog_manage.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Blog">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="6">No blogs found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-start">
                        {{ $blogs->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
