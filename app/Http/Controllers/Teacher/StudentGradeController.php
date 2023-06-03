<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use App\Models\Student;
use App\Models\Semester;
use App\Models\StudentGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentGradeRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\StudentGrades\AddStudentGradeNotification;
use App\Notifications\StudentGrades\EditStudentGradeNotification;

class StudentGradeController extends Controller
{
    public function index()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $Student_Grades = StudentGrade::whereIn('section_id', $ids)->get();
        return view('pages.Teachers.dashboard.StudentGrades.index',compact('Student_Grades'));


    }

    
    public function create()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        $Semesters = Semester::all();
        return view('pages.Teachers.dashboard.StudentGrades.add', compact('students','Semesters'));
    }

    public function edit($id)
    {
        $StudentGrade = StudentGrade::findOrFail($id);
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $Students = Student::whereIn('section_id', $ids)->get();
        $Semesters = Semester::all();
        return view('pages.Teachers.dashboard.StudentGrades.edit', compact('Students','StudentGrade','Semesters'));
    }

    
    public function store(StudentGradeRequest $request)
    {
        try
        {
            $sections = Student::where('id',$request->Student_id)->pluck('section_id');

            $StudentGrade = new StudentGrade();
            $StudentGrade->student_id = strip_tags($request->Student_id);
            $StudentGrade->semester_id = strip_tags($request->Semester_id);

            foreach ($sections as $student){
            $StudentGrade->section_id = $student;
            }

            $StudentGrade->homework = strip_tags($request->Homework);
            $StudentGrade->verbal = strip_tags($request->Verbal);
            $StudentGrade->attendance = strip_tags($request->Attendance);
            $StudentGrade->editorial = strip_tags($request->Editorial);
            $StudentGrade->total = strip_tags($request->Total);
            $StudentGrade->month = strip_tags($request->Month);
            $StudentGrade->create_by = auth()->user()->name;
            $StudentGrade->save();

            $student_names = Student::where('id',$request->Student_id)->pluck('name');
            foreach ($student_names as $name)
            {
                $users = User::all();
                $create_by = auth()->user()->name;
    
                Notification::send($users, new AddStudentGradeNotification($StudentGrade->id,$create_by,$name));
            }
            

            toastr()->success('تم حفظ محصـلـة الطـالـب بنجاح');
            return redirect()->route('Teacher_Grades.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(StudentGradeRequest $request)
    {
        
    try {
        $sections = Student::where('id',$request->Student_id)->pluck('section_id');

        $StudentGrade = StudentGrade::findOrFail(strip_tags($request->id));

        $StudentGrade->student_id = strip_tags($request->Student_id);
        $StudentGrade->semester_id = strip_tags($request->Semester_id);

        foreach ($sections as $student){
            $StudentGrade->section_id = $student;
            }

        $StudentGrade->homework = strip_tags($request->Homework);
        $StudentGrade->verbal = strip_tags($request->Verbal);
        $StudentGrade->attendance = strip_tags($request->Attendance);
        $StudentGrade->editorial = strip_tags($request->Editorial);
        $StudentGrade->total = strip_tags($request->Total);
        $StudentGrade->month = strip_tags($request->Month);
        $StudentGrade->create_by = auth()->user()->name;
        $StudentGrade->save();

        $student_names = Student::where('id',$request->Student_id)->pluck('name');
        foreach ($student_names as $name)
        {
            $users = User::all();
            $create_by = auth()->user()->name;

            Notification::send($users, new EditStudentGradeNotification($StudentGrade->id,$create_by,$name));
        }

        toastr()->success('تم تعـديـل محصـلـة الطـالـب بنجاح');
        return redirect()->route('Teacher_Grades.index');
    }
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }

}
