<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Semester;
use App\Models\StudentGrade;
use Illuminate\Http\Request;
use App\Http\Requests\StudentGradeRequest;

class StudentGradeController extends Controller
{
    public function index()
    {
        $Student_Grades = StudentGrade::all();
        return view('pages.Student_Grades.index', compact('Student_Grades'));
    }

    public function create()
    {
        $Students = Student::all();
        $Semesters = Semester::all();
        return view('pages.Student_Grades.add', compact('Students','Semesters'));
    }

    public function edit($id)
    {
        $StudentGrade = StudentGrade::findOrFail($id);
        $Students = Student::all();
        $Semesters = Semester::all();
        return view('pages.Student_Grades.edit', compact('Students','StudentGrade','Semesters'));
    }

    public function store(StudentGradeRequest $request)
    {
        try
        {
            $StudentGrade = new StudentGrade();
            $StudentGrade->student_id = strip_tags($request->Student_id);
            $StudentGrade->semester_id = strip_tags($request->Semester_id);
            $StudentGrade->homework = strip_tags($request->Homework);
            $StudentGrade->verbal = strip_tags($request->Verbal);
            $StudentGrade->attendance = strip_tags($request->Attendance);
            $StudentGrade->editorial = strip_tags($request->Editorial);
            $StudentGrade->total = strip_tags($request->Total);
            $StudentGrade->month = strip_tags($request->Month);
            $StudentGrade->create_by = auth()->user()->name;
            $StudentGrade->save();


            toastr()->success('تم حفظ محصـلـة الطـالـب بنجاح');
            return redirect()->route('Student_Grades.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(StudentGradeRequest $request)
    {
        
    try {
        $StudentGrade = StudentGrade::findOrFail(strip_tags($request->id));

        $StudentGrade->student_id = strip_tags($request->Student_id);
        $StudentGrade->semester_id = strip_tags($request->Semester_id);
        $StudentGrade->homework = strip_tags($request->Homework);
        $StudentGrade->verbal = strip_tags($request->Verbal);
        $StudentGrade->attendance = strip_tags($request->Attendance);
        $StudentGrade->editorial = strip_tags($request->Editorial);
        $StudentGrade->total = strip_tags($request->Total);
        $StudentGrade->month = strip_tags($request->Month);
        $StudentGrade->create_by = auth()->user()->name;
        $StudentGrade->save();

        toastr()->success('تم تعـديـل محصـلـة الطـالـب بنجاح');
        return redirect()->route('Student_Grades.index');
    }
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }

    public function destroy(Request $request)
    {
        StudentGrade::findOrFail($request->id)->delete();
        toastr()->error('تم حـذف محصـلـة الطـالـب بنجاح');
        return redirect()->route('Student_Grades.index');
    }
}
