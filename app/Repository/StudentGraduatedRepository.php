<?php


namespace App\Repository;


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
        $Grades = Grade::all();
        return view('pages.Students.Graduated.create',compact('Grades'));
    }

    public function SoftDelete($request)
    {
        $students = Student::where('grade_id',$request->Grade_id)->where('classroom_id',$request->Classroom_id)->where('section_id',$request->Section_id)->get();

        if($students->count() < 1){
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }

        foreach ($students as $student){
            $ids = explode(',',$student->id);

            Graduation::updateOrCreate([
                'student_id' => $student->id,
                'grade_id' => $request->Grade_id,
                'classroom_id' => $request->Classroom_id,
                'section_id' => $request->Section_id,
                'date' => date('Y-m-d'),
                'create_by' =>auth()->user()->name,
            ]);
        }

        toastr()->success('تـم إضـافة الطـلاب المتخـرجيـن بنجـاح');
        return redirect()->route('Graduated.index');
    }

    public function ReturnData($request)
    {
        Student::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success('تـم إلغـاء عمليـة تخـرج  الطـالـب  بنجـاح');
        return redirect()->back();
    }

    public function destroy($request)
    {
        Student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error('تـم حـذف الطـالـب بنجـاح');
        return redirect()->back();
    }


}