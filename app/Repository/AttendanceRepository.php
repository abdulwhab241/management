<?php


namespace App\Repository;


use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Attendance;

class AttendanceRepository implements AttendanceRepositoryInterface
{

    public function index()
    {
        $Attendances = Attendance::all();
        $Classrooms = Classroom::all();
        $Students = Student::all();
        $Teachers = Teacher::all();
        $Sections = Section::all();
        return view('pages.Attendance.index',compact('Classrooms','Students','Teachers','Sections','Attendances'));
    }

    // public function show($id)
    // {
    //     // $students = Student::with('attendance')->where('section_id',$id)->get();
    //     // return view('pages.Attendance.index',compact('students'));
    // }

    public function store($request)
    {
        try {

            $Attendances = new Attendance();
            $Attendances->student_id = strip_tags($request->Student_id);
            $Attendances->classroom_id = strip_tags($request->Classroom_id);
            $Attendances->section_id = strip_tags($request->Section_id);
            $Attendances->teacher_id = strip_tags($request->Teacher_id);
            $Attendances->attendance_date = date('Y-m-d');
            $Attendances->subject = strip_tags($request->Subject);
            $Attendances->attendance_status = strip_tags($request->Attendance);
            $Attendances->create_by = auth()->user()->name;
            $Attendances->save();

            toastr()->success('تـم إضـافـة الحضـور والغيـاب بنجـاح');
            return redirect()->route('Attendance.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        }


    public function update($request)
    {
    
    }

    public function destroy($request)
    {
        try {
            Attendance::destroy($request->id);
            toastr()->error('تـم حـذف الحضـور والغيـاب بنجـاح');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}