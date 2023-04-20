<?php


namespace App\Repository;


use App\Models\Grade;
use App\Models\Student;
use App\Models\Classroom;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{

    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('pages.Students.Graduated.index',compact('students'));
    }

    public function create()
    {
        $Grades = Grade::all();
        $Classrooms = Classroom::all();
        return view('pages.Students.Graduated.create',compact('Grades','Classrooms'));
    }

    public function SoftDelete($request)
    {
        $students = student::where('grade_id',$request->Grade_id)->where('classroom_id',$request->Classroom_id)->get();

        if($students->count() < 1){
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }

        foreach ($students as $student){
            $ids = explode(',',$student->id);
            student::whereIn('id', $ids)->Delete();
        }

        toastr()->success('تـم إضـافة الطـلاب المتخـرجيـن بنجـاح');
        return redirect()->route('Graduated.index');
    }

    public function ReturnData($request)
    {
        student::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success('تـم إلغـاء عمليـة تخـرج  الطـالـب  بنجـاح');
        return redirect()->back();
    }

    public function destroy($request)
    {
        student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error('تـم حـذف الطـالـب بنجـاح');
        return redirect()->back();
    }


}