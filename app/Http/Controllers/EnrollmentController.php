<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Requests\EnrollmentRequest;

class EnrollmentController extends Controller
{
    public function index()
    {
        $Enrollments = Enrollment::where('year', date("Y"))->get();
        $Students = Student::all();
        return view('pages.Enrollments.index',compact('Enrollments','Students'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Enrollments.add',compact('Grades'));
    }

    public function add_student(Request $request)
    {
        
    try {
        // $grades = Student::where('id',$request->Student_id)->pluck('grade_id');
        // $classrooms = Student::where('id',$request->Student_id)->pluck('classroom_id');
        // $sections = Student::where('id',$request->Student_id)->pluck('section_id');
        
        // $Enrollment = new Enrollment();

        // $Enrollment->student_id = strip_tags($request->Student_id);

        // foreach ($grades as $grade){
        //     $Enrollment->grade_id = $grade;
        // }

        // foreach ($sections as $section){
        //     $Enrollment->section_id = $section;
        // }

        // foreach ($classrooms as $classroom){
        //     $Enrollment->classroom_id = $classroom;
        // }

        // $Enrollment->save();

        Enrollment::onlyTrashed()->where('student_id', $request->Student_id)->first()->restore();

        toastr()->success('تم تسجـيـل الطـالـب بنجاح');
        return redirect()->back();
    }
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }
    public function store(EnrollmentRequest $request)
    {
        $students = Student::where('grade_id',$request->Grade_id)->where('classroom_id',$request->Classroom_id)->where('section_id',$request->Section_id)->get();

        if($students->count() < 1){
            toastr()->error('لاتوجد بيانات في جدول الطلاب');
            return redirect()->back();
        }

        foreach ($students as $student){
            $ids = explode(',',$student->id);

            Enrollment::updateOrCreate([
                'student_id' => $student->id,
                'grade_id' => strip_tags($request->Grade_id),
                'classroom_id' => strip_tags($request->Classroom_id),
                'section_id' => strip_tags($request->Section_id),
                'year' => strip_tags($request->Year),
                'date' => date('Y-m-d'),
                'create_by' =>auth()->user()->name,
            ]);
        }

        toastr()->success('تـم تسجـيل الطـلاب  بنجـاح');
        return redirect()->route('Enrollments.index');
    }

    public function destroy(Request $request)
    {
        Enrollment::findOrFail(strip_tags($request->id))->delete();
        toastr()->error('تـم إلغـاء  تسجـيل  الطـالـب  بنجـاح');
        return redirect()->back();
    }
}
