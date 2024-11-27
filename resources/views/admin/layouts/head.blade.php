<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title') {{ settings()->website_name }}</title>
<link rel="stylesheet" href="{{ asset('/storage/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('/storage/vendors/base/vendor.bundle.base.css') }}">
<link rel="stylesheet" href="{{ asset('/storage/css/style.css') }}">
<link rel="shortcut icon" href="{{ asset('/storage/admin') }}/{{settings()->website_favicon}}" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pe-icon-7-stroke/1.2.1/pe-icon-7-stroke.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<style>
    .vertical-nav-menu li a {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        padding: 0 10px !important;
    }

    .vertical-nav-menu li a span {
        display: flex !important;
        gap: 20px !important;
        align-items: center !important;
    }

    a {
        text-decoration: none !important;
    }

    .logo_div {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .logo_text {
        font-weight: 900;
        font-size: 20px;
        margin-bottom: 0 !important;
    }

    .company-info {
        display: none;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table,
    th,
    td {
        /* border: 1px solid #ddd; */
        padding: 5px !important;
        text-align: left;
    }

    th,
    td {
        padding: 10px;
        /* text-align: center; */
    }

    .dataTables_wrapper div.dataTables_length select {
        width: 60px !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0 !important;
    }

    .stretch-card {
        text-decoration: none;
    }

    .form-check-label {
        margin-left: 0 !important;
    }

    .dashboard-search-field,
    .dashboard-appointment-details {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        padding-bottom: 50px;
    }

    .dashboard-search-field input {
        max-width: 600px;
    }

    #dashboard_patient_found {
        /* display: none; */
        padding-bottom: 40px;
    }

    #dashboard_patient_for_consultant .card {
        padding-bottom: 40px;
    }

    .custom-center-all-items {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .patient-details-height {
        height: 250px;
        overflow: auto;
    }

    .profile-history-part {
        padding-top: 40px;
    }

    .patient-profile-action-buttons {
        padding-top: 30px;
    }

    #prescription_form_intro td {
        width: 50%;
    }

    #prescription_form_condition_disease {
        padding-top: 40px;
    }

    #prescription_form_condition_disease table textarea {
        width: 100%;
        height: 100%;
    }

    #prescription_form_condition_disease table th,
    #prescription_form_condition_disease table td {
        width: 33.33%;
    }

    #prescription_form_condition_disease table th {
        text-align: center;
    }

    #prescription_form_bottom table textarea {
        width: 100%;
    }

    #prescription_form_bottom table td {
        vertical-align: top;
    }

    #prescription_form_bottom {
        padding-top: 80px;
    }

    #prescription_form_most_bottom {
        padding-top: 50px;
        text-align: right;
    }

    #prescription_form_most_bottom strong {
        padding-right: 20px;
    }

    .custom-image-container {
        display: flex;
        /* Use Flexbox layout */
        justify-content: space-between;
        /* Distribute space between items */
        align-items: center;
        /* Vertically center items */
        width: 100%;
        /* Ensure the container takes up full width of its parent */
        padding: 10px;
        /* Optional padding */
        box-sizing: border-box;
        /* Ensure padding is included in the width calculation */
    }

    .custom-image-container img {
        width: 10%;
        min-width: 100px;
        height: auto;
        padding-left: 15px;
        padding-right: 15px;
    }

    #dashboardSearchTable table th,
    #dashboardSearchTable table td,
    #upperLowerLimbTable table th,
    #upperLowerLimbTable table td {
        text-align: center;
    }

    #consultants .form-check .form-check-input {
        margin-left: -0.5em;
    }

    #consultants .card .card-body {
        padding: 0.875rem 1.875rem;
    }

    .custom-center-text {
        text-align: center;
    }

    .custom-colored-hr {
        height: 5px !important;
        color: #08660b;
    }

    .custom-colored-hr-second {
        height: 2px !important;
        color: #08660b;
    }

    #view_table_occupational_therapy_intervention table th,
    #speechLanguageTargetActivitiesTable table th {
        text-align: center;
        background-color: #b2c3e7;
    }

    #view_table_occupational_therapy_intervention table td {
        height: 400px;
        vertical-align: top;
        background-color: #f7f7d8;
    }

    #speechLanguageTargetActivitiesTable table td,
    #careAndTreatmentPlanTable table tbody td {
        height: 350px;
        vertical-align: top;
    }

    #view_table_occupational_therapy_intervention .table,
    #view_table_occupational_therapy_intervention .table.table-bordered {
        border-top: 1px solid #000000;
        --bs-table-border-color: #000000;
    }

    .text-underline {
        text-decoration: underline;
    }

    .vas_scale_radio_container {
        display: flex;
        gap: 46px;
        padding-left: 110px;
    }

    #musclePowerTable table tr,
    #jointRangeTable table tr {
        height: 20px;
    }

    #musclePowerTable table thead th,
    #musclePowerTable table tbody td,
    #jointRangeTable table thead th,
    #jointRangeTable table tbody td,
    #fimScaleTable table thead th:not(:first-child),
    #fimScaleTable table tbody td:not(:first-child),
    #careAndTreatmentPlanTable table thead th {
        text-align: center;
    }

    #services table th {
        width: 200px;
    }

    .action-buttons {
    display: inline-block;

}

.action-buttons .btn {
    margin: 0 2px; /* Adjust margin as needed */
}
    @media print {
        body {
            margin: 0;
            padding: 0;
        }

        .mt-4 {
            margin-top: 0rem !important;
        }

        .content-wrapper,
        .card-body {
            padding: 0rem !important;
        }

        .custom-image-container {
            padding-top: 0px !important;
        }

        .no-print {
            display: none !important;
        }

        .card-body {
            position: relative;
            width: 100%;
            page-break-inside: auto;
            margin: 0;
            padding: 0;
        }

        .card-body * {
            position: relative;
            visibility: visible;
        }

        body * {
            visibility: hidden;
        }

        @page {
            margin: 0;
            size: A4;
        }

        /* Page break settings */
        .page-break-before {
            page-break-before: always;
        }

        .page-break-after {
            page-break-after: always;
        }

        .page-break-inside {
            page-break-inside: avoid;
        }

    }
    #profileTable th,
    #profileTable td{
        padding: 5px !important;
    }
    .tab-content {
    border: 1px solid #f1f6f8;
    border-top: 0;
    padding: 0rem 1rem;
    }
</style>
@stack('css')
