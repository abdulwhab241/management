<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\TeacherSubject;
use App\Http\Requests\TeacherSubjectRequest;

class TeacherSubjectController extends Controller
{
    public function index()
    {
        $TeacherSubjects = TeacherSubject::where('year', date('Y'))->get();
        return view('pages.TeacherSubjects.index',compact('TeacherSubjects'));
    }

    public function create()
    {
        $Teachers = Teacher::all();
        $Subjects = Subject::where('year', date('Y'))->get();
        return view('pages.TeacherSubjects.create',compact('Subjects','Teachers'));
    }

    public function edit($id)
    {
        $TeacherSubjects = TeacherSubject::findOrFail($id);
        $Teachers = Teacher::all();
        $Subjects = Subject::where('year', date('Y'))->get();
        return view('pages.TeacherSubjects.edit',compact('Subjects','Teachers','TeacherSubjects'));
    }

    public function store(TeacherSubjectRequest $request)
    {
        try {

            $TeacherSubjects = new TeacherSubject();
    
            $TeacherSubjects->teacher_id = strip_tags($request->Teacher_id);
            $TeacherSubjects->subject_id = strip_tags($request->Subject_id);
            $TeacherSubjects->year = date('Y');
            $TeacherSubjects->create_by = auth()->user()->name;
            $TeacherSubjects->save();

            toastr()->success('تم إضـافـة مادة المعلم بنجاح');
            return redirect()->route('TeacherSubjects.create');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(TeacherSubjectRequest $request)
    {
        try {

            $TeacherSubjects = TeacherSubject::findOrFail(strip_tags($request->id));
    
            $TeacherSubjects->teacher_id = strip_tags($request->Teacher_id);
            $TeacherSubjects->subject_id = strip_tags($request->Subject_id);
            $TeacherSubjects->year = date('Y');
            $TeacherSubjects->create_by = auth()->user()->name;
            $TeacherSubjects->save();

            toastr()->success('تم تعديل مادة المعلم بنجاح');
            return redirect()->route('TeacherSubjects.index');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        TeacherSubject::findOrFail(strip_tags($request->id))->delete();
        toastr()->error('تم حذف مادة المعلم بنجاح');
        return redirect()->route('TeacherSubjects.index');
    }
}
