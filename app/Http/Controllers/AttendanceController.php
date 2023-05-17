<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Requests\AttendanceRequest;

class AttendanceController extends Controller
{
    public function index()
    {
        $Attendances = Attendance::all();
        $Classrooms = Classroom::all();
        $Students = Student::all();
        return view('pages.Attendance.index',compact('Classrooms','Students','Attendances'));
    }

    public function store(AttendanceRequest $request)
    {
        try {

            $Attendances = new Attendance();
            $Attendances->day = strip_tags($request->Day_id);
            $Attendances->student_id = strip_tags($request->Student_id);
            $Attendances->classroom_id = strip_tags($request->Classroom_id);
            $Attendances->section_id = strip_tags($request->Section_id);
            $Attendances->attendance_date = date('Y-m-d');
            $Attendances->attendance_status = strip_tags($request->Attendance);
            $Attendances->create_by = auth()->user()->name;
            $Attendances->save();

            toastr()->success('تـم إضـافـة التحضيـر بنجـاح');
            return redirect()->route('Attendance.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(AttendanceRequest $request)
    {
        try {
            // dd($request);

            $Attendances = Attendance::findOrFail($request->id);
            $Attendances->day = strip_tags($request->Day_id);
            $Attendances->student_id = strip_tags($request->Student_id);
            $Attendances->classroom_id = strip_tags($request->Classroom_id);
            $Attendances->section_id = strip_tags($request->Section_id);
            $Attendances->attendance_date = date('Y-m-d');
            $Attendances->attendance_status = strip_tags($request->Attendance);
            $Attendances->create_by = auth()->user()->name;
            $Attendances->save();

            toastr()->success('تـم تعـديـل التحضيـر بنجـاح');
            return redirect()->route('Attendance.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        Attendance::findOrFail($request->id)->delete(); 
        toastr()->error('تم حذف التحضيـر بنجاح');
        return redirect()->route('Attendance.index');
    }
}
