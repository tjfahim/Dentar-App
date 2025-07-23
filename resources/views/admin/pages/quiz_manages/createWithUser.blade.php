@extends('admin.layouts.master')

@section('title')
    Add Quiz |
@endsection




@section('content')
<div class="row mt-4 d-flex justify-content-center">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <form id="quizForm">
                @csrf 
 @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif    
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Add Quiz</h4>
                        <a href="{{ route('quizManage.index') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="List Quizzes"><i class="mdi mdi-step-backward"></i>List Quizzes</a>
                    </div>
                    <div class="row mt-5">
                        <div class="mt-2">
                            <label for="name">Quiz Name</label>
                            <input type="text" name="name" class="form-control border-info" value="{{ old('name') }}" placeholder="Enter Quiz Name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control border-info" placeholder="Enter Description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="start_time">Start Time</label>
                            <input type="datetime-local" name="start_time" class="form-control border-info" value="{{ old('start_time') }}" required>
                            @error('start_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="end_time">End Time</label>
                            <input type="datetime-local" name="end_time" class="form-control border-info" value="{{ old('end_time') }}" required>
                            @error('end_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control border-info">
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-sm btn-info"><i class="mdi mdi-content-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Doctor Lists</h4>
                    
                </div>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{ settings()->website_name }}</h1>
                        <p class="mt-1">{{ settings()->address }}</p>
                        <p class="mt-1">{{ settings()->website_email }}</p>
                    </div>


                     <div>
                    <div class="row mb-4">
                            <div class="col-md-4">
                                <label for="districtFilter" class="form-label fw-bold">Filter by District</label>
                          
                                <select id="districtFilter" class="form-select border-secondary select2">
                                    <option value="">-- Select District --</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->name }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="specializationFilter" class="form-label fw-bold">Filter by Specialization</label>
                                <select id="specializationFilter" class="form-select border-secondary">
                                    <option value="">-- Select Specialization --</option>
                                    @foreach($specializations as $specialization)
                                        <option value="{{ $specialization->name }}">{{ $specialization->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="hospitalFilter" class="form-label fw-bold">Filter by Organization</label>
                                <select id="hospitalFilter" class="form-select border-secondary">
                                    <option value="">-- Select Organization --</option>
                                    @foreach($hospitals as $hospital)
                                        <option value="{{ $hospital->name }}">{{ $hospital->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                </div>


                    <table id="doctorTableQuizFilter" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th>#</th>
                                <th style="display: none;">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Specialization</th>
                                <th>Organization</th>
                                <th>Address</th>
                                <th>Status</th>
                                <!-- <th class="action">Action</th> -->
                                <th style="text-align: center;">
                                    <div>Select All</div>
                                    <input type="checkbox"
                                        class="select-all-user"
                                    >
                                </th>
                            </tr>
                        </thead>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div id="messageContainer"></div>
                        <tbody id="doctorsTableBodyQuiz">
                            @forelse ($doctors as $index =>  $doctor)
                            <tr class="text-center">
                               
                                <td style="display: none;">{{ $doctor->id }}</td>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->email }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->specialization }}</td>
                                <td>{{ $doctor->organization }}</td>
                                <td>{{ $doctor->address }}</td>
                                <td>
                                    @if ($doctor->status == '1')
                                        <span style="color: green">Active</span>
                                  
                                    @elseif ($doctor->status == '0')
                                        <span style="color: darkred">Suspend</span>
                                    @endif
                                </td>
                                <!-- <td class="action d-flex justify-content-center align-items-center">
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-success me-2"
                                        data-toggle="modal"
                                        data-target="#doctorModal"
                                        onclick="showDoctorDetails({{ $doctor }})"
                                        title="View Doctor">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                     <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Doctor">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </a>
                                    <form action="{{ route('doctor.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Doctor">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form> 
                                </td> -->
                                  <td style="text-align: center;">
                                    <input type="checkbox"
                                        class="quiz-access-checkbox"
                                        data-doctor-id="{{ $doctor->id }}">
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="7">No data found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>


                    
                    
                </div>
            </div>
        </div>
      

    </div>


    {{-- <div class="col-lg-12 grid-margin stretch-card">

        <div class="card p-5">
                <h5>Send Notification to Listed Doctors</h5>
                <form id="notificationForm">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="notificationTitle" placeholder="Notification Title" required>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="notificationBody" placeholder="Notification Body" required>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="mdi mdi-bell-ring"></i> Send
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div> --}}




</div>

<!-- Modal -->
<div class="modal fade" id="doctorModal" tabindex="-1" aria-labelledby="doctorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="doctorModalLabel">Doctor Details</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> <span id="doctorName"></span></p>
                        <p><strong>Email:</strong> <span id="doctorEmail"></span></p>
                        <p><strong>Phone:</strong> <span id="doctorPhone"></span></p>
                        <p><strong>Specialization:</strong> <span id="doctorSpecialization"></span></p>
                        <p><strong>Gender:</strong> <span id="doctorGender"></span></p>
                        <p><strong>Date of Birth:</strong> <span id="doctorDob"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Hospital:</strong> <span id="doctorHospital"></span></p>
                        <p><strong>Degree:</strong> <span id="doctorDegree"></span></p>
                        <p><strong>Address:</strong> <span id="doctorAddress"></span></p>
                        <p><strong>BMDc Number:</strong> <span id="doctorBmdcNumber"></span></p>
                        <p><strong>Biography:</strong> <span id="doctorBiography"></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img id="doctorImage" src="" alt="Doctor's Image" class="img-fluid" style="max-height: 150px;">
                        <p><img id="doctorSignature" src="" alt="Signature" class="img-fluid" style="max-height: 50px;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function(){

        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "-- Select Option --",
                allowClear: true,
                width: '100%'
            });
        });
        
        let form = document.getElementById('quizForm');


        let selectButton = document.querySelector('.select-all-user');
        // let checkboxlistUser = document.querySelectorAll('.quiz-access-checkbox');

        selectButton.addEventListener('change', function() {
            console.log(this.checked);

            let checkboxlistUser = document.querySelectorAll('.quiz-access-checkbox');

            checkboxlistUser.forEach(element => {
                element.checked = this.checked
            });
        });

        

        form.addEventListener('submit', function(e){
            e.preventDefault();

            const storeQuizUrl = "{{ route('quizManage.storewithuser') }}";


            let name = document.querySelector('input[name="name"]').value;
            let description = document.querySelector('textarea[name="description"]').value;
            let start_time = document.querySelector('input[name="start_time"]').value;
            let end_time = document.querySelector('input[name="end_time"]').value;
            let status = document.querySelector('select[name="status"]').value;

            let table = document.getElementById('doctorsTableBodyQuiz');

            let checkboxlist = document.querySelectorAll('.quiz-access-checkbox');

            let doctorIds = [];

            checkboxlist.forEach(function(item){
                if(item.checked){
                    // console.dir(item.dataset.doctorId)
                    doctorIds.push(item.dataset.doctorId)
                }
                
            });

            

            fetch(storeQuizUrl, {
                method: "POSt",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({
                    name: name,
                    description: description,
                    start_time: start_time,
                    end_time: end_time,
                    status: status,
                    doctor_ids: doctorIds
                })
            })
            .then(async response => {
                if (!response.ok) {
                    // Expecting validation error
                    const errorData = await response.json();
                    if (errorData.errors) {
                        let messages = Object.values(errorData.errors).flat().join('\n');
                        alert('Validation Errors:\n' + messages);
                    } else {
                        alert('Something went wrong');
                    }
                    throw new Error('Validation failed');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                
                alert("Quiz added successfully!");
                 window.location.href = "{{ route('quizManage.indexwithuser') }}";
            })
            .catch(error => {
                console.error('Error:', error);
            });
            // .then(response => response.json())
            // .then(data => {
            //     if(!data.success){
            //         console.log(data.errors);
            //     }
            // })
            // .catch(error => {
            //     console.log(error)
            // })
    
            // let tableRows = table.querySelectorAll('quiz-access-checkbox');




            // // console.log(tableRows);
            // let userIds = "";
            // tableRows.forEach(row => {
            //     console.log(row.querySelector('td'));
            //     // let id = row.querySelector('td').textContent;
            //     // userIds += id.trim() + " ";
            // });

            // // console.log(userIds);
        });



    });
</script>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function fetchFilteredData() {
        let districtId = $('#districtFilter').val();
        let specializationId = $('#specializationFilter').val();
        let hospitalId = $('#hospitalFilter').val();

        console.log('working good');

        $.ajax({
            url: "{{ route('quizManage.filter') }}",
            method: "GET",
            data: {
                district_id: districtId,
                specialization_id: specializationId,
                hospital_id: hospitalId
            },
            beforeSend: function() {
                $('#doctorTableQuizFilter tbody').html('<tr><td colspan="10" class="text-center">Loading...</td></tr>');
            },
            success: function(response) {
                // console.log(response)
                let selectButton = document.querySelector('.select-all-user');
                selectButton.checked = false;
                $('#doctorTableQuizFilter tbody').html(response);
            },
            error: function() {
                $('#doctorTableQuizFilter tbody').html('<tr><td colspan="10" class="text-center text-danger">Something went wrong!</td></tr>');
            }
        });
    }

    $('#districtFilter, #specializationFilter, #hospitalFilter').change(fetchFilteredData);
</script>
@endpush


