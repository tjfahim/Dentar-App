<?php

namespace App\Http\Controllers;

use App\Models\Diognostic;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionAssist;
use App\Models\PrescriptionRead;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $usersCount = User::where('role', 'user')->count();


        $doctorsCount = Doctor::count();
        $diagnostic_doctorCount = Doctor::where('role', 'admin')->count();
        $patientsCount = Patient::count();
        $studentsCount = Student::count();
        $adminCount = User::where('role', 'admin')->count();

        $total_case = Diognostic::count();
        $report_case =Diognostic::with('prescription')->whereHas('prescription')->count();
        $pending_case = Diognostic::with('prescription')->doesntHave('prescription')->count();

        $prescriptionAssist_Count = PrescriptionAssist::count();
        $prescriptionAssist_pending = PrescriptionAssist::with('reports')->doesntHave('reports')->count();
        $prescriptionAssist_done = PrescriptionAssist::with('reports')->whereHas('reports')->count();


        $prescriptionRead_count = PrescriptionRead::count();
        $prescriptionRead_pending = PrescriptionRead::with('report')->doesntHave('report')->count();
        $prescriptionRead_done = PrescriptionRead::with('report')->whereHas('report')->count();




        return view('admin.pages.dashboard',
        compact('usersCount',
                'doctorsCount',
                'diagnostic_doctorCount',
                'patientsCount',
                'studentsCount',
                'adminCount',
                'total_case',
                'pending_case',
                'report_case',
                'prescriptionAssist_Count',
                'prescriptionAssist_pending',
                'prescriptionAssist_done',
                'prescriptionRead_count',
                'prescriptionRead_pending',
                'prescriptionRead_done'
            ));
    }
}
