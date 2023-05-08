<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AttendanceRequest;

class TeacherStudentController extends Controller
{
    public function index()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        return view('pages.Teachers.dashboard.students.index', compact('students'));
    }

    public function sections()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $sections = Section::whereIn('id', $ids)->get();
        return view('pages.Teachers.dashboard.sections.index', compact('sections'));
    }

    public function attendance(AttendanceRequest $request)
    {

        try {
            Attendance::updateOrCreate(
                [
                'day' => strip_tags($request->Day_id),
                'student_id' => strip_tags($request->student_id),
                'classroom_id' => strip_tags($request->classroom_id),
                'section_id' => strip_tags($request->section_id),
                'attendance_date' => date('Y-m-d'),
                'attendance_status' => strip_tags($request->Attendance),
                'create_by' => auth()->user()->name
            ]);

            toastr()->success('تـم إضـافـة التحضيـر بنجـاح');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // public function editAttendance(Request $request)
    // {
    //     try {
    //         $date = date('Y-m-d');
    //         $student_id = Attendance::where('attendance_date', $date)->where('student_id', $request->id)->first();
    //         if ($request->attendances == 'presence') {
    //             $attendance_status = 'حـاضـر';
    //         } else if ($request->attendances == 'absent') {
    //             $attendance_status = 'غـائـب';
    //         }
    //         $student_id->update([
    //             'attendance_status' => $attendance_status
    //         ]);
    //         toastr()->success(trans('messages.success'));
    //         return redirect()->back();
    //     } catch (\Exception $e) {
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }

    public function attendanceReport()
    {

        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
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
        $students = Student::whereIn('section_id', $ids)->get();

        if ($request->student_id == 0) 
        {

            $Students = Attendance::whereBetween('attendance_date', [$request->from, $request->to])->get();
            return view('pages.Teachers.dashboard.students.attendance_report', compact('Students', 'students'));
        } 
        else 
        {
            $Students = Attendance::whereBetween('attendance_date', [$request->from, $request->to])
                ->where('student_id', $request->student_id)->get();
            return view('pages.Teachers.dashboard.students.attendance_report', compact('Students', 'students'));
        }
    }


}
