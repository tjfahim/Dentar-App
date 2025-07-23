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

    <div class="row " id="dashboard_items">
       
        @foreach([
            ['url' => route('notifications_system.index'), 'count' => 'Send Notification', 'title' => 'Notification', 'color' => '#DE2525'],
            ['url' => route('doctor.index'), 'count' => $doctorsCount, 'title' => 'Doctors', 'color' => '#36C93B'],
            ['url' => route('doctor.diagnostic'), 'count' => $diagnostic_doctorCount, 'title' => 'Diagnostic Doctors', 'color' => '#C10FA6'],
            ['url' => route('student.index'), 'count' => $studentsCount, 'title' => 'Students', 'color' => '#0CDFF6'],
            ['url' => route('patient.index'), 'count' => $patientsCount, 'title' => 'Patients', 'color' => '#DAD725'],
            ['url' => route('diagnostic_case.index'), 'count' => $total_case, 'title' => 'Total Case', 'color' => '#36C93B'],
            ['url' => route('diagnostic_case.pending'), 'count' => $pending_case, 'title' => 'Pending Case', 'color' => '#DA2810', 'title_color' => '#DE2525'],
            ['url' => route('diagnostic_case.compelete'), 'count' => $report_case, 'title' => 'Complete Case', 'color' => '#36C93B',  'title_color' => '#36C93B'],
            ['url' => route('prescription_assists.index'), 'count' => $prescriptionAssist_Count, 'title' => 'Prescription Assist', 'color' => '#0022FF'],
            ['url' => route('p_assists.pending'), 'count' => $prescriptionAssist_pending, 'title' => 'Prescription Assist Pending', 'color' => '#DE2525',  'title_color' => '#DE2525'],
            ['url' => route('p_assists.complete'), 'count' => $prescriptionAssist_done, 'title' => 'Prescription Assist Done', 'color' => '#36C93B', 'title_color' => '#36C93B'],
            ['url' => route('prescription_reads.index'), 'count' => $prescriptionRead_count, 'title' => 'Prescription Read', 'color' => '#DA7F10'],
            ['url' => route('p_reads.pending'), 'count' => $prescriptionRead_pending, 'title' => 'Prescription Read Pending', 'color' => '#DA2810',  'title_color' => '#DE2525'],
            ['url' => route('p_reads.complete'), 'count' => $prescriptionRead_done, 'title' => 'Prescription Read Done', 'color' => '#36C93B', 'title_color' => '#36C93B'],
        ] as $index => $item)
        <div class="col-md-3 col-3 mb-4 dashboard-item" data-title="{{ $item['title'] }}" data-count="{{ $item['count'] }}" >
            <a href="{{ $item['url'] }}" class="d-block text-decoration-none">
                <div class="card d-flex flex-column" style=" height: 300px; background-color:#1A2233; border-radius: 15px;" >
                    <div class="card-body pb-0 ">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="text-danger font-weight-bold"  style="font-size: 35px;"  >
                                <div style="font-size: {{ $index == 0 ? '24px' : '24px' }}; color: {{ $item['title_color'] ?? '#fff' }};">
                                {{ $item['title'] }} 
                                </div>
                            </div>
                            <i class="mdi mdi-account-outline mdi-18px text-white"></i>
                        </div>
                    </div>
                    <canvas id="allProducts"></canvas>
                    <div class="line-chart-row-title p-10 text-center" style=" height: 50%; width: 95%; padding-top: 15px; " >
                        @if($index == 0 ) 
                            <h2 style="font-size: 30px; font-weight: bold; margin-bottom: 30px; margin-top: 15px; text-transform: capitalize; color: {{ $item['color'] ?? 'blue' }};">{{ $item['count'] }}</h2>
                        @else
                            <h2 style="font-size: 40px; font-weight: bold; margin-bottom: 30px; text-transform: capitalize; color: {{ $item['color'] ?? 'blue' }};">Total - {{ $item['count'] }}</h2>
                        @endif
                        <style>
                            .hover-dark:hover {
                                background-color: #000000;
                            }
                        </style>
                        
                        <button class="btn hover-dark"
                            style="font-size: 14px; padding: 10px 30px; background-color: #26334D; color: white; border-top-left-radius: 50px; border-bottom-left-radius: 50px; border-top-right-radius: 50px; border-bottom-right-radius: 50px; transition: background-color 0.3s ease;">
                            View All
                        </button>
                    </div>
                   
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

