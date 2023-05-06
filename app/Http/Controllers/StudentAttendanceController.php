<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class StudentAttendanceController extends Controller
{
    public function index()
    {
        $Attendances = Attendance::select('*')->where('student_id', auth()->user()->id)
        ->where('classroom_id',auth()->user()->classroom_id)
        ->where('section_id',auth()->user()->section_id)
        ->get();
    
        return view('pages.Students.Attendance.index',compact('Attendances'));
    }
}
