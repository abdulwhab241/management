<?php


namespace App\Repository;


use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;

class SubjectRepository implements SubjectRepositoryInterface
{

    public function index()
    {
        $subjects = Subject::get();
        return view('pages.Subjects.index',compact('subjects'));
    }

    public function create()
    {
        $grades = Grade::get();
        $teachers = Teacher::get();
        return view('pages.Subjects.create',compact('grades','teachers'));
    }


    public function store($request)
    {
        try {
            $subjects = new Subject();
            $subjects->name = strip_tags($request->Name);
            $subjects->degree = strip_tags($request->Degree);
            $subjects->grade_id = strip_tags($request->Grade_id);
            $subjects->classroom_id = strip_tags($request->Class_id);
            $subjects->teacher_id = strip_tags($request->teacher_id);
            $subjects->create_by = auth()->user()->name;
            $subjects->save();
            toastr()->success('تم حفظ المادة بنجاح');
            return redirect()->route('Subjects.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function edit($id){

        $subject =Subject::findOrFail($id);
        $grades = Grade::get();
        $teachers = Teacher::get();
        return view('pages.Subjects.edit',compact('subject','grades','teachers'));

    }

    public function update($request)
    {
        try {
            $subjects =  Subject::findOrFail($request->id);
            $subjects->name = strip_tags($request->Name);
            $subjects->degree = strip_tags($request->Degree);
            $subjects->grade_id = strip_tags($request->Grade_id);
            $subjects->classroom_id = strip_tags($request->Class_id);
            $subjects->teacher_id = strip_tags($request->teacher_id);
            $subjects->create_by = auth()->user()->name;
            $subjects->save();
            toastr()->success('تم تعديل المادة بنجاح');
            return redirect()->route('Subjects.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Subject::destroy($request->id);
            toastr()->error('تم حذف المادة بنجاح');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}