@extends('admin.layouts.master')

@section('title')
Edit Blog |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Blog</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('blog_manage.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter blog title" value="{{ old('title', $blog->title) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" id="content" rows="10" placeholder="Enter blog content" required>{{ old('content', $blog->content) }}</textarea>
                    </div>
                   <div class="form-group">
                        <label for="files">Upload Files</label>
                        <input type="file" name="files[]" class="form-control-file" id="files" multiple>
                        @if ($blog->file)
                            <p>Current Files: 
                                @foreach (json_decode($blog->file) as $file)
                                    <a href="{{ asset($file) }}" target="_blank">{{ basename($file) }}</a> 
                                @endforeach
                            </p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="1" {{ old('status', $blog->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $blog->status) == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('blog_manage.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
