@extends('admin.layouts.master')

@section('title', 'Social Links')

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Social Links</h4>
                
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('socialLink.update', $socialLink->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook', $socialLink->facebook) }}">
                    </div>

                    <div class="form-group">
                        <label for="gmail">Gmail</label>
                        <input type="email" name="gmail" id="gmail" class="form-control" value="{{ old('gmail', $socialLink->gmail) }}">
                    </div>

                    <div class="form-group">
                        <label for="linkedin">LinkedIn</label>
                        <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{ old('linkedin', $socialLink->linkedin) }}">
                    </div>

                    <div class="form-group">
                        <label for="messenger">Messenger</label>
                        <input type="text" name="messenger" id="messenger" class="form-control" value="{{ old('messenger', $socialLink->messenger) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
