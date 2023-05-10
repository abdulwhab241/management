<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AttendanceRequest;

class TeacherAttendanceController extends Controller
{
    public function index()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        $attendances = Attendance::whereIn('section_id', $ids)->get();
        return view('pages.Teachers.dashboard.Attendances.index',compact('students','attendances'));
    }

    public function store(AttendanceRequest $request)
    {

        try {
            Attendance::updateOrCreate(
                [
                'day' => strip_tags($request->Day_id),
                'student_id' => strip_tags($request->Student_id),
                'classroom_id' => strip_tags($request->Classroom_id),
                'section_id' => strip_tags($request->Section_id),
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

    public function update(AttendanceRequest $request)
    {
        try {

            $Attendances = Attendance::findOrFail($request->id);
            $Attendances->day = strip_tags($request->Day_id);
            $Attendances->student_id = strip_tags($request->Student_id);
            $Attendances->classroom_id = strip_tags($request->Classroom_id);
            $Attendances->section_id = strip_tags($request->Section_id);
            $Attendances->attendance_date = date('Y-m-d');
            $Attendances->attendance_status = strip_tags($request->Attendance);
            $Attendances->create_by = auth()->user()->name;
            $Attendances->save();

            toastr()->success('تـم تعـديـل تحضـير الطـالـب بنجـاح');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        try {
            Attendance::findOrFail($request->id)->delete(); 
            toastr()->error('تم حذف التحضيـر بنجاح');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
