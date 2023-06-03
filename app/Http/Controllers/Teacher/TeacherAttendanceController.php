<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Student\StudentAttendanceNotification;

class TeacherAttendanceController extends Controller
{
    public function index(Request $request)
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        $attendances = Attendance::whereIn('section_id', $ids)->get();
    
        return view('pages.Teachers.dashboard.Attendances.index',compact('students','attendances'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Student_id' => 'required|integer',
            'Day_id' => 'required',
            'Attendance' => 'required'
        ]);
        try {

            $sections = Student::where('id',$request->Student_id)->pluck('section_id');
            $classrooms = Student::where('id',$request->Student_id)->pluck('classroom_id');

            $Attendances = new Attendance();
            $Attendances->day = strip_tags($request->Day_id);
            $Attendances->student_id = strip_tags($request->Student_id);

            foreach($classrooms as $classroom)
            {
                $Attendances->classroom_id = $classroom;
            }

            foreach($sections as $section)
            {
                $Attendances->section_id = $section;
            }

            $Attendances->attendance_date = date('Y-m-d');
            $Attendances->attendance_status = strip_tags($request->Attendance);
            $Attendances->create_by = auth()->user()->name;
            $Attendances->save();


            $student = Student::where('id', '=', $Attendances->student_id)->get();
            $create_by = auth()->user()->name;

            Notification::send($student, new StudentAttendanceNotification($Attendances->id,$create_by,$Attendances->day));

            toastr()->success('تـم إضـافـة التحضيـر بنجـاح');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'Student_id' => 'required|integer',
            'Day_id' => 'required',
            'Attendance' => 'required'
        ]);
        try {
            $sections = Student::where('id',$request->Student_id)->pluck('section_id');
            $classrooms = Student::where('id',$request->Student_id)->pluck('classroom_id');

            $Attendances = Attendance::findOrFail($request->id);
            $Attendances->day = strip_tags($request->Day_id);
            $Attendances->student_id = strip_tags($request->Student_id);
            foreach($classrooms as $classroom)
            {
                $Attendances->classroom_id = $classroom;
            }

            foreach($sections as $section)
            {
                $Attendances->section_id = $section;
            }
            
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
