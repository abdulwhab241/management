<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use App\Models\Month;
use App\Models\Result;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Semester;
use App\Models\Enrollment;
use App\Models\StudentGrade;
use Illuminate\Http\Request;
use App\Models\StudentResult;
use App\Models\TeacherSubject;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\Teacher\StudentGradeRequest;
use App\Notifications\StudentGrades\AddStudentGradeNotification;
use App\Notifications\StudentGrades\EditStudentGradeNotification;

class StudentGradeController extends Controller
{
    public function index()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $Classrooms = Section::with(['StudentGrades'])->where('year', date('Y'))->whereIn('id', $ids)->get();
        return view('pages.Teachers.dashboard.StudentGrades.index',compact('Classrooms'));
    }

    
    public function create()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students= Enrollment::whereIn('section_id', $ids)->where('year', date("Y"))->get();
        $Semesters = Semester::all();
        $Months = Month::all();
        $Subjects = TeacherSubject::where('teacher_id', auth()->user()->id)->where('year',date('Y'))->get();

        return view('pages.Teachers.dashboard.StudentGrades.add', compact('students','Semesters','Months','Subjects'));
    }

    public function edit($id)
    {
        $StudentGrade = StudentGrade::findOrFail($id);
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $Students= Enrollment::whereIn('section_id', $ids)->where('year', date("Y"))->get();
        $Semesters = Semester::all();
        $Months = Month::all();
        $Subjects = TeacherSubject::where('teacher_id', auth()->user()->id)->where('year',date('Y'))->get();

        return view('pages.Teachers.dashboard.StudentGrades.edit', compact('Students','StudentGrade','Semesters','Months','Subjects'));
    }

    public function print($id)
    {
        $Classrooms = Section::with(['StudentGrades'])->findOrFail( $id);
        return view('pages.Teachers.dashboard.StudentGrades.print', compact('Classrooms'));
    }

    
    public function store(StudentGradeRequest $request)
    {
        try
        {
            // dd($request);
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
            $StudentGrade->teacher_id = auth()->user()->id;
            $StudentGrade->subject_id = strip_tags($request->Subject_id);

            foreach ($sections as $section){
            $StudentGrade->section_id = $section;
            }

            $StudentGrade->semester_id = strip_tags($request->Semester_id);
            $StudentGrade->result = $Results;
            $StudentGrade->homework = strip_tags($request->Homework);
            $StudentGrade->verbal = strip_tags($request->Verbal);
            $StudentGrade->attendance = strip_tags($request->Attendance);
            $StudentGrade->total = $Total;
            $StudentGrade->month_id = strip_tags($request->Month);
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


            $student_names = Student::where('id',strip_tags($request->Student_id))->pluck('name');
            foreach ($student_names as $name)
            {
                $users = User::all();
                $create_by = auth()->user()->name;
    
                Notification::send($users, new AddStudentGradeNotification($StudentGrade->id,$create_by,$name));
            }
            

            toastr()->success('تم إضـافـة محصـلـة الطـالـب بنجاح');
            return redirect()->route('Teacher_Grades.create');
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
        $StudentGrade->teacher_id = auth()->user()->id;
        $StudentGrade->subject_id = strip_tags($request->Subject_id);

        foreach ($sections as $section){
            $StudentGrade->section_id = $section;
        }

        $StudentGrade->semester_id = strip_tags($request->Semester_id);
        $StudentGrade->result =  $Results;
        $StudentGrade->homework = strip_tags($request->Homework);
        $StudentGrade->verbal = strip_tags($request->Verbal);
        $StudentGrade->attendance = strip_tags($request->Attendance);
        $StudentGrade->total = $Total;
        $StudentGrade->month_id = strip_tags($request->Month);
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

    public function destroy(Request $request)
    {
        StudentGrade::findOrFail(strip_tags($request->id))->delete();
        StudentResult::where('student_grade_id',strip_tags($request->id))->delete();
        toastr()->error('تم حـذف محصـلـة الطـالـب بنجاح');
        return redirect()->route('Teacher_Grades.index');
    }

}
