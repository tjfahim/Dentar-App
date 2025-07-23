@extends('admin.layouts.master')

@section('title')
View Blog |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $blog->title }}</h4>

                <!-- Blog Content -->
                <div class="blog-content">
                    <p>{!! nl2br(e($blog->content)) !!}</p>
                </div>

                <!-- Display the uploaded files (if any) -->
                @if ($blog->file)
                    <div class="mt-4">
                        <h5>Uploaded Files:</h5>
                        <div>
                            @foreach (json_decode($blog->file) as $file)
                                <div class="" style="width: 300px; height: 300px;">
                                    @if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                        <!-- Display Image -->
                                        <img src="{{ asset($file) }}" alt="{{ basename($file) }}" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                                    @else
                                        <!-- Display other file types as links -->
                                        <a href="{{ asset($file) }}" target="_blank">{{ basename($file) }}</a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Status Display -->
                <div class="mt-4">
                    <strong>Status:</strong>
                    <p>{{ $blog->status == 1 ? 'Active' : 'Inactive' }}</p>
                </div>

                <!-- Back Button -->
                <div class="mt-4">
                    <a href="{{ route('blog_manage.index') }}" class="btn btn-secondary">Back to Blog List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
