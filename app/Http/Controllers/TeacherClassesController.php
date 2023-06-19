<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherClassesRequest;

class TeacherClassesController extends Controller
{
    public function index()
    {
        $teacher_classes = TeacherClass::where('year', date('Y'))->get();
        return view('pages.TeacherClasses.index', compact('teacher_classes'));
    }

    public function create()
    {
        $Teachers = Teacher::all();
        return view('pages.TeacherClasses.add', compact('Teachers'));
    }

    public function edit($id)
    {
        $TeacherClasses = TeacherClass::findOrFail($id);
        $Teachers = Teacher::all();
        return view('pages.TeacherClasses.edit', compact('Teachers','TeacherClasses'));
    }

    public function print()
    {
        $TeacherClasses = TeacherClass::where('year', date('Y'))->get();
        return view('pages.TeacherClasses.print', compact('TeacherClasses'));
    }

    public function store(TeacherClassesRequest $request)
    {
        try {
            $TeacherClasses = new TeacherClass();
            $TeacherClasses->day = strip_tags($request->Day_id);
            $TeacherClasses->teacher_id = strip_tags($request->Teacher_id);
            $TeacherClasses->first = strip_tags($request->First);
            $TeacherClasses->second = strip_tags($request->Second);
            $TeacherClasses->third = strip_tags($request->Third);
            $TeacherClasses->fourth = strip_tags($request->Fourth);
            $TeacherClasses->fifth = strip_tags($request->Fifth);
            $TeacherClasses->sixth = strip_tags($request->Sixth);
            $TeacherClasses->seventh = strip_tags($request->Seventh);
            $TeacherClasses->year = date('Y');
            $TeacherClasses->create_by = auth()->user()->name;
            $TeacherClasses->save();
            toastr()->success('تـم إضـافـة جـدول حصـص المعلميـن بنجـاح');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(TeacherClassesRequest $request)
    {

        try {
            $TeacherClasses = TeacherClass::findOrFail(strip_tags($request->id));
    
            $TeacherClasses->day = strip_tags($request->Day_id);
            $TeacherClasses->teacher_id = strip_tags($request->Teacher_id);
            $TeacherClasses->first = strip_tags($request->First);
            $TeacherClasses->second = strip_tags($request->Second);
            $TeacherClasses->third = strip_tags($request->Third);
            $TeacherClasses->fourth = strip_tags($request->Fourth);
            $TeacherClasses->fifth = strip_tags($request->Fifth);
            $TeacherClasses->sixth = strip_tags($request->Sixth);
            $TeacherClasses->seventh = strip_tags($request->Seventh);
            $TeacherClasses->year = date('Y');
            $TeacherClasses->create_by = auth()->user()->name;
            $TeacherClasses->save();

            toastr()->success('تم تعديـل جـدول حصـص المعلميـن بنجاح');
    
            return redirect()->route('Classes_Teacher.index');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        TeacherClass::findOrFail(strip_tags($request->id))->delete(); 
        toastr()->error('تم حذف جـدول حصـص المعلم بنجاح');
        return redirect()->back();
    }
}
