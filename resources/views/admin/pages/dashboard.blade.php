@extends('admin.layouts.master')
@section('title')
Dashboard |
@endsection
@section('content')
<div class=" mt-2">
	<div id="dashboard_patient_found">
		<div class="card">
			<div class="card-body pb-0">
				<div class="dashboard-search-field">
					<input type="text" id="dashboard_search" name="dashboard_search" class="form-control" placeholder="Mobile">
					<button id="search_button" class="btn btn-secondary">Search</button>
				</div>
				<div class="align-items-center justify-content-between">

				</div>
			</div>
		</div>
	</div>

    <div class="row row-cols-6">

		@foreach([
		// ['url' => route('courseGoal.index'), 'count' => $courseGoalManageCount, 'title' => 'Course Goal'],
		// ['url' => route('courseManages.index'), 'count' => $courseManageCount, 'title' => 'Courses'],
		// ['url' => route('booksManage.index'), 'count' => $booksManageCount, 'title' => 'Books'],
		// ['url' => route('chapterManage.index'), 'count' => $chapterManageCount, 'title' => 'Chapters'],
		// ['url' => route('mentorManage.index'), 'count' => $mentorManageCount, 'title' => 'Mentors'],
		// ['url' => route('moduleManage.index'), 'count' => $moduleManageCount, 'title' => 'Modules'],
		// ['url' => route('videoManage.index'), 'count' => $videoManageCount, 'title' => 'Videos'],
		// ['url' => route('pdfManage.index'), 'count' => $pdfManageCount, 'title' => 'PDF'],
		['url' => '', 'count' => $usersCount, 'title' => 'Users'],
		['url' => '', 'count' => $doctorsCount, 'title' => 'Doctors'],
		['url' => '', 'count' => $diagnostic_doctorCount, 'title' => 'Diagnostic Doctors'],
		['url' => '', 'count' => $studentsCount, 'title' => 'Students'],
		['url' => '', 'count' => $patientsCount, 'title' => 'Patients'],
		['url' => '', 'count' => $total_case, 'title' => 'Total Case'],
		['url' => '', 'count' => $pending_case, 'title' => 'Pending Case'],
		['url' => '', 'count' => $report_case, 'title' => 'Complete Case'],
		['url' => '', 'count' => $prescriptionAssist_Count, 'title' => 'Prescription Assist'],
		['url' => '', 'count' => $prescriptionAssist_pending, 'title' => 'Prescription Assist Pending'],
		['url' => '', 'count' => $prescriptionAssist_done, 'title' => 'Prescription Assist Done'],
		['url' => '', 'count' => $prescriptionRead_count, 'title' => 'Prescription Read'],
		['url' => '', 'count' => $prescriptionRead_pending, 'title' => 'Prescription Read Pending'],
		['url' => '', 'count' => $prescriptionRead_done, 'title' => 'Prescription Read Done'],
		] as $item)
		<div class="col-md-2 mb-4">
			<a href="{{ $item['url'] }}" class="d-block text-decoration-none">
				<div class="card d-flex flex-column">
					<div class="card-body pb-0">
						<div class="d-flex align-items-center justify-content-between">
							<h2 class="text-danger font-weight-bold">{{ $item['count'] }}</h2>
							<i class="mdi mdi-account-outline mdi-18px text-dark"></i>
						</div>
					</div>
					<canvas id="allProducts"></canvas>
					<div class="line-chart-row-title">{{ $item['title'] }}</div>
				</div>
			</a>
		</div>
		@endforeach


        {{-- <div class="col-md-2 mb-4">
			<a href="/" class="d-block text-decoration-none">
				<div class="card d-flex flex-column">
					<div class="card-body pb-0">
						<div class="d-flex align-items-center justify-content-between">
							<h2 class="text-danger font-weight-bold">42</h2>
							<i class="mdi mdi-account-outline mdi-18px text-dark"></i>
						</div>
					</div>
					<canvas id="allProducts"></canvas>
					<div class="line-chart-row-title">Doctors</div>
				</div>
			</a>
		</div> --}}

	</div>


</div>

@endsection
