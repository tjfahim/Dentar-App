@extends('admin.layouts.master')
@section('title')
	Profile |
@endsection
@section('content')
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- <form action="{{ route('usersUpdate', $user->id) }}" method="post" enctype="multipart/form-data"> --}}
                    @method('put')
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
                            <h4 class="card-title">User Profile</h4>
                            <!-- <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#passwordModal">Change Password</button> -->
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <table id="profileTable">

                                    <tr>
                                        <th>Name</th>
                                        <td>: {{ $user->name ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>: {{ $user->email ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>: {{ $user->phone ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>Present Address</th>
                                        <td>: {{ $user->present_address ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>Permanent Address</th>
                                        <td>: {{ $user->permanent_address ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>Designation</th>
                                        <td>: {{ $user->designation ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <td>: {{ $user->location ?? ''}}</td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-md-4">
                                <table>
                                    <tr>
                                        <th>Image</th>
                                        <td>: <img src="{{asset('storage')}}/{{$user->image ?? ''}}" style="height: 100px; width: auto;" alt="profile image"></td>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <td>:

                                            @if($user->status == 1)
                                                Active
                                            @else
                                                Pending
                                            @endif

                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table>
                                    <tr>
                                        <th></th>
                                        @php
                                            $completedPayments = array_column($userPayment->toArray(), 'payment_status');
                                        @endphp
                                        <td>
                                            @if (in_array('completed', $completedPayments) &&
                                                \Carbon\Carbon::parse($user->subscription_start_date) <= now() &&
                                                \Carbon\Carbon::parse($user->subscription_end_date) >= now())
                                                Premium user
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>



                        </div>

                        <ul class="nav nav-tabs d-flex" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="quiz-tab" data-bs-toggle="tab" data-bs-target="#quiz-tab-pane"
                                    type="button" role="tab" aria-controls="quiz-tab-pane" aria-selected="true">Course Quiz</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="level-quiz-tab" data-bs-toggle="tab" data-bs-target="#level-quiz-tab-pane"
                                    type="button" role="tab" aria-controls="level-quiz-tab-pane" aria-selected="false">Level Quiz</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="user-education-tab" data-bs-toggle="tab" data-bs-target="#user-education-tab-pane"
                                    type="button" role="tab" aria-controls="user-education-tab-pane" aria-selected="false">User Education</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payments-tab" data-bs-toggle="tab" data-bs-target="#payments-tab-pane"
                                    type="button" role="tab" aria-controls="payments-tab-pane" aria-selected="false">Payments</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="get-start-tab" data-bs-toggle="tab" data-bs-target="#get-start-tab-pane"
                                    type="button" role="tab" aria-controls="get-start-tab-pane" aria-selected="false">Get Start</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade" id="quiz-tab-pane" role="tabpanel" aria-labelledby="quiz-tab">
                                @include('admin.pages.users.partials._quiz', ['records' => $uniqueCourseQuizs])
                            </div>

                            <div class="tab-pane fade" id="level-quiz-tab-pane" role="tabpanel" aria-labelledby="level-quiz-tab">
                                @include('admin.pages.users.partials._level_quiz', ['records' => $uniqueLevelQuizs])
                            </div>

                            <div class="tab-pane fade" id="user-education-tab-pane" role="tabpanel" aria-labelledby="user-education-tab">
                                @include('admin.pages.users.partials._education_data', ['records' => $user->educations])
                            </div>

                            <div class="tab-pane fade" id="payments-tab-pane" role="tabpanel" aria-labelledby="payments-tab">
                                @include('admin.pages.users.partials._payments', ['records' => $user])
                            </div>

                            <div class="tab-pane fade" id="get-start-tab-pane" role="tabpanel" aria-labelledby="get-start-tab">
                                @include('admin.pages.users.partials._get_start', ['records' => $user->getStart])
                            </div>
                        </div>

                    </div>
                {{-- </form> --}}


            </div>
        </div>
    </div>


@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
      // Get the tab from the URL query parameter
      let tab = new URLSearchParams(window.location.search).get('tab');

      // Check if a tab is specified
      if (tab) {
          // Find the corresponding tab button
          let targetTabButton = document.querySelector(`#${tab}`);
          let targetTabPane = document.querySelector(`#${tab}-pane`);

          if (targetTabButton && targetTabPane) {
              // Remove 'active' class from all tab buttons and panes
              document.querySelectorAll('.nav-link').forEach(button => button.classList.remove('active'));
              document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('show', 'active'));

              // Activate the target tab and pane
              targetTabButton.classList.add('active');
              targetTabPane.classList.add('show', 'active');
          }
      } else {
          let defaultTabButton = document.querySelector('#quiz-tab');
          let defaultTabPane = document.querySelector('#quiz-tab-pane');

          if (defaultTabButton && defaultTabPane) {
              defaultTabButton.classList.add('active');
              defaultTabPane.classList.add('show', 'active');
          }
      }
    });
  </script>
