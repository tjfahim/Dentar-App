@extends('admin.layouts.master')

@section('title')
Video Manage |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Video Lists</h4>
                     <div class="d-flex">
                        <!--<button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">-->
                        <!--    <i class="mdi mdi-printer"></i>-->
                        <!--    Print-->
                        <!--</button>-->
                        <a href="{{ route('videomanage.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Videos"><i class="mdi mdi-library-plus"></i>Add Videos</a>
                    </div>
                   
                </div>

              

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{ settings()->website_name }}</h1>
                        <p class="mt-1">{{ settings()->address }}</p>
                        <p class="mt-1">{{ settings()->website_email }}</p>
                    </div>
                    <table id="quizManageTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Poster</th>
                                <th>Video URL</th>
                                <th>Status</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <tbody id="videoTableBody">
                            @forelse ($videos as $index => $video)
                            <tr class="text-center">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $video->title }}</td>
                                <td>{{ Str::limit($video->description, 50) }}</td>
                                <td>
                                    @if ($video->image_poster)
                                    <img src="{{ asset('storage/' . $video->image_poster) }}" alt="Video Poster" style="width: 200px; height: 200px; border-radius: 0px;" width="300" height="auto">
                                    @else
                                    No Image
                                    @endif
                                </td>
                                <td><a href="{{ $video->url }}" target="_blank">View Video</a></td>
                                <td>
                                    @if ($video->status == '1')
                                    <span style="color: green">Active</span>
                                    @elseif ($video->status == '0')
                                    <span style="color: red">Inactive</span>
                                    @endif
                                </td>

                                <td class="action d-flex justify-content-center align-items-center">
                                    <!-- Show Button -->
                                    <button type="button" class="btn btn-sm btn-success me-2" data-toggle="modal" data-target="#videoModal" onclick="showVideoDetails({{ $video }})" title="View Video">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                    <!-- Edit Button -->
                                    <a href="{{ route('videomanage.edit', $video->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Video">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('videomanage.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Video">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="7">No videos found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="videoModalLabel">Video Details</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Title:</strong> <span id="videoTitle"></span></p>
                        <p><strong>Description:</strong> <span id="videoDescription"></span></p>
                        <p><strong>Poster:</strong> <img id="videoPoster" width="150" alt="Video Poster"></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>URL:</strong> <a id="videoUrl" href="#" target="_blank">View Video</a></p>
                        <p><strong>Status:</strong> <span id="videoStatus"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function showVideoDetails(videoData) {
        const baseUrl = "{{ asset('') }}";
        
        document.getElementById('videoTitle').innerText = videoData.title;
        document.getElementById('videoDescription').innerText = videoData.description;
        document.getElementById('videoPoster').src = videoData.image_poster ? `${baseUrl}/${videoData.image_poster}` : '/images/no-image.jpg';
        document.getElementById('videoUrl').href = videoData.url;
        document.getElementById('videoStatus').innerText = videoData.status === 'active' ? 'Active' : 'Inactive';
    }

    // Event listener for changing filter option
    document.getElementById('filter_option').addEventListener('change', function () {
        var filterOption = this.value;
        var startDateInput = document.getElementById('start_date');
        var endDateInput = document.getElementById('end_date');

        if (filterOption === 'custom') {
            // Set opacity to 100% when custom date range is selected
            startDateInput.style.opacity = '1';
            endDateInput.style.opacity = '1';
        } else {
            // Set opacity to 30% when other options are selected
            startDateInput.style.opacity = '0.3';
            endDateInput.style.opacity = '0.3';
        }
    });
</script>
