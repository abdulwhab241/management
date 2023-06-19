<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Semester;
use App\Models\Enrollment;
use App\Models\StudentGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\StudentGradesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StudentGradeRequest;

class StudentGradeController extends Controller
{
    public function index()
    {
        $Student_Grades = StudentGrade::where('year', date('Y'))->get();
        return view('pages.Student_Grades.index', compact('Student_Grades'));
    }

    public function create()
    {
        $Students = Enrollment::where('year', date("Y"))->get();
        $Semesters = Semester::all();
        $Teachers = Teacher::all();
        $Subjects = Subject::all();
        $Results = Result::where('year', date("Y"))->get();
        return view('pages.Student_Grades.add', compact('Students','Semesters','Results','Teachers','Subjects'));
    }

    public function edit($id)
    {
        $StudentGrade = StudentGrade::findOrFail($id);
        $Students = Enrollment::where('year', date("Y"))->get();
        $Semesters = Semester::all();
        $Teachers = Teacher::all();
        $Subjects = Subject::all();
        $Results = Result::where('year', date("Y"))->get();
        return view('pages.Student_Grades.edit', compact('Students','StudentGrade','Semesters','Results','Teachers','Subjects'));
    }

    public function show($id)
    {
        $StudentGrade = StudentGrade::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->add_student_grade_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Student_Grades.notification', compact('StudentGrade'));
    }

    public function edit_notification($id)
    {
        $StudentGrade = StudentGrade::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->edit_student_grade_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Student_Grades.edit_notification', compact('StudentGrade'));
    }

    public function export() 
    {
        return Excel::download(new StudentGradesExport, 'كشف دراجات الطلاب.xlsx');
    }
    
    public function print()
    {
        $StudentGrade = StudentGrade::where('year', date('Y'))->get();
        return view('pages.Student_Grades.print', compact('StudentGrade'));
    }


    public function store(StudentGradeRequest $request)
    {
        try
        {
            // $classrooms = Student::where('id',$request->Student_id)->pluck('classroom_id');
            $sections = Student::where('id',strip_tags($request->Student_id))->pluck('section_id');

            $StudentGrade = new StudentGrade();
            $StudentGrade->student_id = strip_tags($request->Student_id);
            $StudentGrade->teacher_id = strip_tags($request->Teacher_id);
            $StudentGrade->subject_id = strip_tags($request->Subject_id);

            foreach ($sections as $section){
                $StudentGrade->section_id = $section;
            }

            // foreach ($classrooms as $classroom){
            //     $StudentGrade->classroom_id = $classroom;
            // }

            $StudentGrade->semester_id = strip_tags($request->Semester_id);
            $StudentGrade->result_id = strip_tags($request->Result_id);
            $StudentGrade->homework = strip_tags($request->Homework);
            $StudentGrade->verbal = strip_tags($request->Verbal);
            $StudentGrade->attendance = strip_tags($request->Attendance);
            // $StudentGrade->editorial = strip_tags($request->Editorial);
            $StudentGrade->total = strip_tags($request->Total);
            $StudentGrade->month = strip_tags($request->Month);
            $StudentGrade->year = date('Y');
            $StudentGrade->create_by = auth()->user()->name;
            $StudentGrade->save();


            toastr()->success('تم إضـافـة محصـلـة الطـالـب بنجاح');
            return redirect()->route('Student_Grades.create');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(StudentGradeRequest $request)
    {
        
    try {
        // $classrooms = Student::where('id',$request->Student_id)->pluck('classroom_id');
        $sections = Student::where('id',strip_tags($request->Student_id))->pluck('section_id');
        
        $StudentGrade = StudentGrade::findOrFail(strip_tags($request->id));

        $StudentGrade->student_id = strip_tags($request->Student_id);
        $StudentGrade->teacher_id = strip_tags($request->Teacher_id);
        $StudentGrade->subject_id = strip_tags($request->Subject_id);

        foreach ($sections as $section){
            $StudentGrade->section_id = $section;
        }

        // foreach ($classrooms as $classroom){
        //     $StudentGrade->classroom_id = $classroom;
        // }

        $StudentGrade->semester_id = strip_tags($request->Semester_id);
        $StudentGrade->result_id = strip_tags($request->Result_id);
        $StudentGrade->homework = strip_tags($request->Homework);
        $StudentGrade->verbal = strip_tags($request->Verbal);
        $StudentGrade->attendance = strip_tags($request->Attendance);
        // $StudentGrade->editorial = strip_tags($request->Editorial);
        $StudentGrade->total = strip_tags($request->Total);
        $StudentGrade->month = strip_tags($request->Month);
        $StudentGrade->year = date('Y');
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
        StudentGrade::findOrFail(strip_tags($request->id))->delete();
        toastr()->error('تم حـذف محصـلـة الطـالـب بنجاح');
        return redirect()->route('Student_Grades.index');
    }
}
