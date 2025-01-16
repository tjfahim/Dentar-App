<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomeNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
    ];

    public static $filter_by = [
        'All user' => 'getAllUsers',
        'All Patients' => 'getPatients',
        'All Students' => 'getStudents',
        'All Doctors' => 'getDoctors',
        'All Admin Doctors' => 'getAdminDoctors'
    ];



    public static function getFilterOptions()
    {
        return array_keys(self::$filter_by);
    }

    public static function getAllUsers()
    {
        $patients = Patient::whereNotNull('token')->get();
        $students = Student::whereNotNull('token')->get();
        $doctors = Doctor::whereNotNull('token')->get();

        return $patients->merge($students)->merge($doctors);
    }

    public static function getPatients()
    {
        return Patient::whereNotNull('token')->get();
    }

    public static function getStudents()
    {
        return Student::whereNotNull('token')->get();
    }

    public static function getDoctors()
    {
        return Doctor::whereNotNull('token')->get();
    }

    public static function getAdminDoctors()
    {
        return Doctor::where('role', 'admin')->whereNotNull('token')->get();
    }


}
