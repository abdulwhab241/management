<?php

namespace App\Http\Controllers\Student;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentAttendanceController extends Controller
{
    public function index()
    {
        $Attendances = Attendance::select('*')->where('student_id', auth()->user()->id)
        ->where('classroom_id',auth()->user()->classroom_id)
        ->where('section_id',auth()->user()->section_id)
        ->where('year', date('Y'))
        ->get();
    
        return view('pages.Students.Attendance.index',compact('Attendances'));
    }

    public function show($id)
    {
        $Attendances = Attendance::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->student_attendance_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Students.Attendance.notification', compact('Attendances'));
    }
}
