<?php


namespace App\Repository;

use App\Models\Enrollment;
use App\Models\Grade;
use App\Models\Graduation;
use App\Models\Student;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{

    public function index()
    {
        $students = Graduation::all();
        return view('pages.Students.Graduated.index',compact('students'));
    }

    public function create()
    {
        $Grades = Grade::where('year', date("Y"))->get();
        return view('pages.Students.Graduated.create',compact('Grades'));
    }

    public function SoftDelete($request)
    {
        $students = Enrollment::where('grade_id',$request->Grade_id)->where('classroom_id',$request->Classroom_id)->where('section_id',$request->Section_id)->where('year', date('Y'))->get();

        if($students->count() < 1){
            toastr()->error('لاتوجد بيانات في جدول الطلاب');
            return redirect()->back();
        }

        foreach ($students as $student){
            $ids = explode(',',$student->student_id);

            Graduation::updateOrCreate([
                'student_id' => $student->student_id,
                'grade_id' => strip_tags($request->Grade_id),
                'classroom_id' => strip_tags($request->Classroom_id),
                'section_id' => strip_tags($request->Section_id),
                'date' => date('Y-m-d'),
                'create_by' =>auth()->user()->name,
            ]);
        }

        toastr()->success('تـم إضـافة الطـلاب المتخـرجيـن بنجـاح');
        return redirect()->route('Graduated.index');
    }


    public function destroy($request)
    {
        Graduation::destroy(strip_tags($request->id));
        toastr()->error('تـم إلغـاء  تخـرج  الطـالـب  بنجـاح');
        return redirect()->back();
    }


}