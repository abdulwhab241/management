<?php

namespace App\Http\Controllers;


use App\Models\Student;
use App\Models\Attendance;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Requests\AttendanceRequest;

class AttendanceController extends Controller
{
    public function index()
    {
        $Attendances = Attendance::where('year', date('Y'))->get();
        $Students = Enrollment::where('year', date("Y"))->get();
        return view('pages.Attendance.index',compact('Students','Attendances'));
    }

    public function create()
    {
        $Students = Enrollment::where('year', date("Y"))->get();
        return view('pages.Attendance.add',compact('Students'));
    }

    public function edit($id)
    {
        $Attendance = Attendance::findOrFail($id);
        $Students = Enrollment::where('year', date("Y"))->get();
        return view('pages.Attendance.edit',compact('Students','Attendance'));
    }

    public function store(AttendanceRequest $request)
    {
        try {
            $classrooms = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('classroom_id');
            $sections = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('section_id');

            $Attendances = new Attendance();
            $Attendances->day = strip_tags($request->Day_id);
            $Attendances->student_id = strip_tags($request->Student_id);

            foreach ($sections as $section){
                $Attendances->section_id = $section;
            }
    
            foreach ($classrooms as $classroom){
                $Attendances->classroom_id = $classroom;
            }

            $Attendances->attendance_date = date('Y-m-d');
            $Attendances->attendance_status = strip_tags($request->Attendance);
            $Attendances->year = date('Y');
            $Attendances->create_by = auth()->user()->name;
            $Attendances->save();

            toastr()->success('تـم إضـافـة تحضـير الطـالـب بنجـاح');
            return redirect()->route('Attendance.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(AttendanceRequest $request)
    {
        try {
            // dd($request);
            $classrooms = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('classroom_id');
            $sections = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('section_id');

            $Attendances = Attendance::findOrFail($request->id);
            $Attendances->day = strip_tags($request->Day_id);
            $Attendances->student_id = strip_tags($request->Student_id);

            
            foreach ($sections as $section){
                $Attendances->section_id = $section;
            }
    
            foreach ($classrooms as $classroom){
                $Attendances->classroom_id = $classroom;
            }

            $Attendances->attendance_date = date('Y-m-d');
            $Attendances->attendance_status = strip_tags($request->Attendance);
            $Attendances->year = date('Y');
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
        Attendance::findOrFail(strip_tags($request->id))->delete(); 
        toastr()->error('تم حذف التحضيـر بنجاح');
        return redirect()->route('Attendance.index');
    }
}
