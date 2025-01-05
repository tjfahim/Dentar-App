@extends('admin.layouts.master')
@section('title')
Dashboard |
@endsection
@section('content')
<div class="mt-2">
    <div id="dashboard_patient_found">
        <div class="card">
            <div class="card-body pb-0">
                <div class="dashboard-search-field">
                    <input type="text" id="dashboard_search" name="dashboard_search" class="form-control" placeholder="Search by title or count">
                    <button id="search_button" class="btn btn-secondary">Search</button>
                </div>
                <div class="align-items-center justify-content-between"></div>
            </div>
        </div>
    </div>

    <div class="row row-cols-6" id="dashboard_items">
        @foreach([
            ['url' => route('doctor.index'), 'count' => $doctorsCount, 'title' => 'Doctors'],
            ['url' => '', 'count' => $diagnostic_doctorCount, 'title' => 'Diagnostic Doctors'],
            ['url' => route('student.index'), 'count' => $studentsCount, 'title' => 'Students'],
            ['url' => route('patient.index'), 'count' => $patientsCount, 'title' => 'Patients'],
            ['url' => route('diagnostic_case.index'), 'count' => $total_case, 'title' => 'Total Case'],
            ['url' => '', 'count' => $pending_case, 'title' => 'Pending Case'],
            ['url' => '', 'count' => $report_case, 'title' => 'Complete Case'],
            ['url' => route('prescription_assists.index'), 'count' => $prescriptionAssist_Count, 'title' => 'Prescription Assist'],
            ['url' => '', 'count' => $prescriptionAssist_pending, 'title' => 'Prescription Assist Pending'],
            ['url' => '', 'count' => $prescriptionAssist_done, 'title' => 'Prescription Assist Done'],
            ['url' => route('prescription_reads.index'), 'count' => $prescriptionRead_count, 'title' => 'Prescription Read'],
            ['url' => '', 'count' => $prescriptionRead_pending, 'title' => 'Prescription Read Pending'],
            ['url' => '', 'count' => $prescriptionRead_done, 'title' => 'Prescription Read Done'],
        ] as $item)
        <div class="col-md-2 mb-4 dashboard-item" data-title="{{ $item['title'] }}" data-count="{{ $item['count'] }}">
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
    </div>
</div>

@endsection




<script>

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('dashboard_search');
    const items = document.querySelectorAll('.dashboard-item');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.toLowerCase();

        items.forEach(item => {
            const title = item.getAttribute('data-title')?.toLowerCase() || '';
            const count = item.getAttribute('data-count')?.toString() || '';

            if (title.includes(query) || count.includes(query)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
});


</script>

