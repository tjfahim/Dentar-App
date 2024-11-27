<!-- base:js -->
<script src="{{ asset('/storage/vendors/base/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('/storage/js/template.js') }}"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<!-- End plugin js for this page -->
<script src="{{ asset('/storage/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('/storage/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('/storage/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js') }}"></script>
    <script src="{{ asset('/storage/vendors/justgage/raphael-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/storage/vendors/justgage/justgage.js') }}"></script>
<script src="{{ asset('/storage/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Custom js for this page-->
<script src="{{ asset('/storage/js/dashboard.js') }}"></script>
<!-- End custom js for this page-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
  $(function () {
    // $('#usersTable').DataTable();
    if ($('#usersTable tbody tr').length > 1) {
        $('#usersTable').DataTable();
    }
    // $('#whyAreYouLearningTable').DataTable();
    if ($('#whyAreYouLearningTable tbody tr').length > 1) {
        $('#whyAreYouLearningTable').DataTable();
    }
    // $('#whereDidYouHearTable').DataTable();
    if ($('#whereDidYouHearTable tbody tr').length > 1) {
        $('#whereDidYouHearTable').DataTable();
    }
    // $('#dailyLearningGoalsTable').DataTable();
    if ($('#dailyLearningGoalsTable tbody tr').length > 1) {
        $('#dailyLearningGoalsTable').DataTable();
    }
    // $('#languageListTable').DataTable();
    if ($('#languageListTable tbody tr').length > 1) {
        $('#languageListTable').DataTable();
    }
    $('#totalLevelTable').DataTable();
    if ($('#totalLevelTable tbody tr').length > 1) {
        $('#totalLevelTable').DataTable();
    }
    // $('#studyDailyTimeTable').DataTable();
    if ($('#studyDailyTimeTable tbody tr').length > 1) {
        $('#studyDailyTimeTable').DataTable();
    }
    // $('#coursesTable').DataTable();
    if ($('#coursesTable tbody tr').length > 1) {
        $('#coursesTable').DataTable();
    }
    // $('#mentorListTable').DataTable();
    if ($('#mentorListTable tbody tr').length > 1) {
        $('#mentorListTable').DataTable();
    }
    // $('#moduleManageTable').DataTable();
    if ($('#moduleManageTable tbody tr').length > 1) {
        $('#moduleManageTable').DataTable();
    }
    // $('#chapterManageTable').DataTable();
    if ($('#chapterManageTable tbody tr').length > 1) {
        $('#chapterManageTable').DataTable();
    }
    // $('#videoManageTable').DataTable();
    if ($('#videoManageTable tbody tr').length > 1) {
        $('#videoManageTable').DataTable();
    }
    // $('#courseGoalTable').DataTable();
    if ($('#courseGoalTable tbody tr').length > 1) {
        $('#courseGoalTable').DataTable();
    }
    // $('#pdfManageTable').DataTable();
    if ($('#pdfManageTable tbody tr').length > 1) {
        $('#pdfManageTable').DataTable();
    }
    // $('#booksManageTable').DataTable();
    if ($('#booksManageTable tbody tr').length > 1) {
        $('#booksManageTable').DataTable();
    }
    // $('#quizManageTable').DataTable();
    if ($('#quizManageTable tbody tr').length > 1) {
        $('#quizManageTable').DataTable();
    }
    // $('#quizQuestionTable').DataTable();
    if ($('#quizQuestionTable tbody tr').length > 1) {
        $('#quizQuestionTable').DataTable();
    }
    // $('#getStartTable').DataTable();
    if ($('#getStartTable tbody tr').length > 1) {
        $('#getStartTable').DataTable();
    }
    // $('#packagesTable').DataTable();
    if ($('#packagesTable tbody tr').length > 1) {
        $('#packagesTable').DataTable();
    }
    // $('#paymentsTable').DataTable();
    if ($('#paymentsTable tbody tr').length > 1) {
        $('#paymentsTable').DataTable();
    }
    // $('#levelManageTable').DataTable();
    if ($('#levelManageTable tbody tr').length > 1) {
        $('#levelManageTable').DataTable();
    }
    // $('#levelContentManageTable').DataTable();
    if ($('#levelContentManageTable tbody tr').length > 1) {
        $('#levelContentManageTable').DataTable();
    }

    if ($('#courseReportManageTable tbody tr').length > 1) {
        $('#courseReportManageTable').DataTable();
    }

    if ($('#levelReportManageTable tbody tr').length > 1) {
        $('#levelReportManageTable').DataTable();
    }

    if ($('#userReportManageTable tbody tr').length > 1) {
        $('#userReportManageTable').DataTable();
    }

    if ($('#courseGoalManageReportTable tbody tr').length > 1) {
        $('#courseGoalManageReportTable').DataTable();
    }

    // $('#allReportsTable').DataTable();
    // if ($('#allReportsTable tbody tr').length > 1) {
    //     $('#allReportsTable').DataTable();
    // }
  });

  @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
</script>

<script>
    function printTable() {
        window.print();
    }
</script>

<script>
    document.getElementById('date_of_birth').addEventListener('change', function() {
        var dob = new Date(this.value);
        var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();
        var monthDiff = today.getMonth() - dob.getMonth();

        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }

        document.getElementById('age').value = age;
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stammeredSyllablesInput = document.getElementById('stammeredSyllables');
        const percentageStammeredSyllablesInput = document.getElementById('percentageStammeredSyllables');
        const calcPercentage = document.getElementById('calcPercentage');

        function calculatePercentage() {
            const stammered = parseFloat(stammeredSyllablesInput.value) || 0;
            const percentage = stammered > 0 ? stammered * 100 : 0;
            calcPercentage.textContent = stammered.toFixed(2);
            percentageStammeredSyllablesInput.value = percentage.toFixed(2) + '%';
        }

        stammeredSyllablesInput.addEventListener('input', calculatePercentage);
    });
</script>



<script>


function showMessage(message, duration) {
    // Get the message container
    var messageDiv = document.getElementById('appointConsultantMessage');

    // Set the message text
    messageDiv.textContent = message;

    // Make the message visible
    messageDiv.style.display = 'block';

    // Hide the message after the specified duration
    setTimeout(function() {
        messageDiv.style.display = 'none';
    }, duration);
}

function deleteConsultantsAppointed(event, consultantId, patientId){
    // this.closest('.card').remove();
    const button = event.target;

    // Find the closest card or card container and remove it
    const card = button.closest('.card');
    if (card) {
        card.remove();
    }

    console.log('consultant ID:', consultantId);
    console.log('patientId ID:', patientId);

    // Send the consultant ID to the server
    fetch('/appoint-consultants-remove', {
        method: 'POST', // or 'DELETE' depending on your route
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.csrfToken
        },
        body: JSON.stringify({ consultantId: consultantId, patientId: patientId }) // Send consultant ID as JSON
    })
    .then(response => response.json())
    .then(data => {
        // Handle the response from the server
        console.log('Success:', data);
    })
    .catch((error) => {
        // Handle any errors
        console.error('Error:', error);
    });
}

function printTheForm() {
    // Print the current page
    window.print();
}
</script>
@stack('scripts')
