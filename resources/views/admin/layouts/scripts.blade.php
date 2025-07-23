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

    if ($('#addressTable tbody tr').length > 1) {
        $('#addressTable').DataTable({
            // "order": [[ 0, "desc" ]]
        });
    }

    if ($('#hospitalTable tbody tr').length > 1) {
        $('#hospitalTable').DataTable({
            // "order": [[ 0, "desc" ]]
        });
    }

     if ($('#specialtyTable tbody tr').length > 1) {
        $('#specialtyTable').DataTable({
            // "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#usersTable tbody tr').length > 1) {
        $('#usersTable').DataTable({
            // "order": [[ 0, "desc" ]]
        });
    }

    if ($('#doctorTable tbody tr').length > 1) {
        $('#doctorTable').DataTable({
            // "order": [[ 0, "desc" ]]
        });
    }

    if ($('#doctorTableQuiz tbody tr').length > 1) {
        $('#doctorTableQuiz').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#whyAreYouLearningTable tbody tr').length > 1) {
        $('#whyAreYouLearningTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#whereDidYouHearTable tbody tr').length > 1) {
        $('#whereDidYouHearTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#dailyLearningGoalsTable tbody tr').length > 1) {
        $('#dailyLearningGoalsTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#languageListTable tbody tr').length > 1) {
        $('#languageListTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    $('#totalLevelTable').DataTable();
    if ($('#totalLevelTable tbody tr').length > 1) {
        $('#totalLevelTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#studyDailyTimeTable tbody tr').length > 1) {
        $('#studyDailyTimeTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#coursesTable tbody tr').length > 1) {
        $('#coursesTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#mentorListTable tbody tr').length > 1) {
        $('#mentorListTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#moduleManageTable tbody tr').length > 1) {
        $('#moduleManageTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#chapterManageTable tbody tr').length > 1) {
        $('#chapterManageTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#videoManageTable tbody tr').length > 1) {
        $('#videoManageTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#courseGoalTable tbody tr').length > 1) {
        $('#courseGoalTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#pdfManageTable tbody tr').length > 1) {
        $('#pdfManageTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#booksManageTable tbody tr').length > 1) {
        $('#booksManageTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#quizManageTable tbody tr').length > 1) {
        $('#quizManageTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#quizQuestionTable tbody tr').length > 1) {
        $('#quizQuestionTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#getStartTable tbody tr').length > 1) {
        $('#getStartTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#packagesTable tbody tr').length > 1) {
        $('#packagesTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#paymentsTable tbody tr').length > 1) {
        $('#paymentsTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#levelManageTable tbody tr').length > 1) {
        $('#levelManageTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
    
    if ($('#levelContentManageTable tbody tr').length > 1) {
        $('#levelContentManageTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }

    if ($('#courseReportManageTable tbody tr').length > 1) {
        $('#courseReportManageTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }

    if ($('#levelReportManageTable tbody tr').length > 1) {
        $('#levelReportManageTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }

    if ($('#userReportManageTable tbody tr').length > 1) {
        $('#userReportManageTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }

    if ($('#courseGoalManageReportTable tbody tr').length > 1) {
        $('#courseGoalManageReportTable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }

    
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