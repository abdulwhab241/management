<?php

namespace App\Http\Controllers;

use App\Models\Month;
use App\Models\Result;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Semester;
use App\Models\Enrollment;
use App\Models\StudentGrade;
use Illuminate\Http\Request;
use App\Models\StudentResult;
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
        $Subjects = Subject::where('year', date("Y"))->get();
        $Months = Month::all();
        return view('pages.Student_Grades.add', compact('Students','Semesters','Teachers','Subjects','Months'));
    }

    public function edit($id)
    {
        $StudentGrade = StudentGrade::findOrFail($id);
        $Students = Enrollment::where('year', date("Y"))->get();
        $Semesters = Semester::all();
        $Teachers = Teacher::all();
        $Subjects = Subject::where('year', date("Y"))->get();
        $Months = Month::all();
        return view('pages.Student_Grades.edit', compact('Students','StudentGrade','Semesters','Teachers','Subjects','Months'));
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
            $Results = Result::where('student_id', strip_tags($request->Student_id))
                                ->where('month_id', strip_tags($request->Month))
                                ->where('exam_id', strip_tags($request->Subject_id))
                                ->where('year', date("Y"))->sum('marks_obtained');
            
            if($Results == null)
            {
                $Results = 0 ;
            }

            $Total = $Results + strip_tags($request->Homework) + strip_tags($request->Verbal) + strip_tags($request->Attendance);
            $sections = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('section_id');

            $StudentGrade = new StudentGrade();
            $StudentGrade->student_id = strip_tags($request->Student_id);
            $StudentGrade->teacher_id = strip_tags($request->Teacher_id);
            $StudentGrade->subject_id = strip_tags($request->Subject_id);
            $StudentGrade->month_id = strip_tags($request->Month);

            foreach ($sections as $section){
                $StudentGrade->section_id = $section;
            }

            $StudentGrade->semester_id = strip_tags($request->Semester_id);
            $StudentGrade->result = $Results;
            $StudentGrade->homework = strip_tags($request->Homework);
            $StudentGrade->verbal = strip_tags($request->Verbal);
            $StudentGrade->attendance = strip_tags($request->Attendance);
            $StudentGrade->total = $Total;
            $StudentGrade->year = date('Y');
            $StudentGrade->create_by = auth()->user()->name;
            $StudentGrade->save();

            $StudentResult = new StudentResult();
            $StudentResult->student_id = strip_tags($request->Student_id);
            $StudentResult->subject_id = strip_tags($request->Subject_id);
            $StudentResult->student_grade_id = strip_tags($StudentGrade->id);
            $StudentResult->month_id = strip_tags($request->Month);
            $StudentResult->degree = $Total;
            $StudentResult->date = date('Y-m-d');
            $StudentResult->year = date('Y');
            $StudentResult->create_by = auth()->user()->name;
            $StudentResult->save();


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

        $Results = Result::where('student_id', strip_tags($request->Student_id))
                            ->where('month_id', strip_tags($request->Month))
                            ->where('exam_id', strip_tags($request->Subject_id))
                            ->where('year', date("Y"))->sum('marks_obtained');

        if($Results == null)
        {
            $Results = 0 ;
        }

        $Total =  $Results + strip_tags($request->Homework) + strip_tags($request->Verbal) + strip_tags($request->Attendance);
        $sections = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('section_id');
        
        $StudentGrade = StudentGrade::findOrFail(strip_tags($request->id));

        $StudentGrade->student_id = strip_tags($request->Student_id);
        $StudentGrade->teacher_id = strip_tags($request->Teacher_id);
        $StudentGrade->subject_id = strip_tags($request->Subject_id);
        $StudentGrade->month_id = strip_tags($request->Month);

        foreach ($sections as $section){
            $StudentGrade->section_id = $section;
        }

        $StudentGrade->semester_id = strip_tags($request->Semester_id);
        $StudentGrade->result =  $Results;
        $StudentGrade->homework = strip_tags($request->Homework);
        $StudentGrade->verbal = strip_tags($request->Verbal);
        $StudentGrade->attendance = strip_tags($request->Attendance);
        $StudentGrade->total = $Total;
        $StudentGrade->year = date('Y');
        $StudentGrade->create_by = auth()->user()->name;
        $StudentGrade->save();


        $StudentResult = StudentResult::where('student_grade_id',strip_tags($request->id))->first();
        $StudentResult->subject_id = strip_tags($request->Subject_id);
        $StudentResult->month_id = strip_tags($request->Month);
        $StudentResult->degree = $Total;
        $StudentResult->date = date('Y-m-d');
        $StudentResult->year = date('Y');
        $StudentResult->create_by = auth()->user()->name;
        $StudentResult->save();

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
        StudentResult::where('student_grade_id',strip_tags($request->id))->delete();
        toastr()->error('تم حـذف محصـلـة الطـالـب بنجاح');
        return redirect()->route('Student_Grades.index');
    }
}
