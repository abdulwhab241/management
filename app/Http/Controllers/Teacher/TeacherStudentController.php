<?php

namespace App\Http\Controllers\teacher;

use App\Models\Section;
use App\Models\Student;
use App\Models\Attendance;
use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\TeacherSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherStudentController extends Controller
{
    public function index()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        // $students = Section::with(['Enrollments'])->whereIn('id', $ids)->get();
        $students= Enrollment::whereIn('section_id', $ids)->where('year', date("Y"))->get();
        return view('pages.Teachers.dashboard.students.index', compact('students'));
    }
    public function sections()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $sections = Section::whereIn('id', $ids)->where('year', date('Y'))->get();
        return view('pages.Teachers.dashboard.sections.index', compact('sections'));
    }
    public function classrooms()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $Classrooms = Section::distinct()->whereIn('id', $ids)->where('year', date('Y'))->get(['class_id']);
        return view('pages.Teachers.dashboard.sections.classroom', compact('Classrooms'));
    }

    public function subjects()
    {
        $Subjects = TeacherSubject::where('teacher_id', auth()->user()->id)->where('year', date('Y'))->get();
        return view('pages.Teachers.dashboard.sections.subject', compact('Subjects'));
    }
    

    public function attendanceReport()
    {

        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students= Enrollment::whereIn('section_id', $ids)->where('year', date("Y"))->get();
        return view('pages.Teachers.dashboard.students.attendance_report', compact('students'));

    }


    public function attendanceSearch(Request $request)
    {

        $request->validate([
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
        ], [
            'to.after_or_equal' => 'تاريخ النهاية لابد ان اكبر من تاريخ البداية او يساويه',
            'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        ]);


        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students= Enrollment::whereIn('section_id', $ids)->where('year', date("Y"))->get();

        if ($request->student_id == 0) 
        {

            $Students = Attendance::whereBetween('attendance_date', [$request->from, $request->to])
                                    ->where('year', date('Y'))->get();
            return view('pages.Teachers.dashboard.students.attendance_report', compact('Students', 'students'));
        } 
        else 
        {
            $Students = Attendance::whereBetween('attendance_date', [$request->from, $request->to])
                ->where('student_id', $request->student_id)
                ->where('year', date('Y'))->get();
            return view('pages.Teachers.dashboard.students.attendance_report', compact('Students', 'students'));
        }
    }


}
