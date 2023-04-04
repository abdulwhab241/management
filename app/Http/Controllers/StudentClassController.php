<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\SchoolClass;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Requests\ClassRequest;

class StudentClassController extends Controller
{
    public function index()
    {
        $StudentClasses = StudentClass::all();
        return view('pages.Classes.index', compact('StudentClasses'));
    }

    public function create()
    {
        $Grades = Grade::all();
        $Days = Day::all();
        $Classrooms = Classroom::all();
        $Sections = Section::all();
        $Teachers = Teacher::all();
        $Schools = SchoolClass::all();
        $Subjects = Subject::all();
        return view('pages.Classes.add',  compact('Grades','Days','Classrooms','Sections','Teachers','Schools','Subjects'));
    }

    public function store(ClassRequest $request)
    {
        try
            {
        
                $StudentClasses = new StudentClass();
                $StudentClasses->day_id = strip_tags($request->Day_id);
                $StudentClasses->grade_id = strip_tags($request->Grade_id);
                $StudentClasses->classroom_id = strip_tags($request->Classroom_id);
                $StudentClasses->section_id = strip_tags($request->Section_id);
                $StudentClasses->class_id = strip_tags($request->School_id);
                $StudentClasses->teacher_id = strip_tags($request->Teacher_id);
                $StudentClasses->subject_id = strip_tags($request->Subject_id);
                $StudentClasses->create_by = auth()->user()->name;

                $StudentClasses->save();
        
                toastr()->success('تم إضافـة بيانـات جدول الحصـص بنجاح');
                return redirect()->route('Classes.index');
            }
            catch(\Exception $e)
            {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
    }

    public function edit($id)
    {
        $StudentClasses = StudentClass::findOrFail($id);
        $Grades = Grade::all();
        $Days = Day::all();
        $Classrooms = Classroom::all();
        $Sections = Section::all();
        $Teachers = Teacher::all();
        $Schools = SchoolClass::all();
        $Subjects = Subject::all();
        return view('pages.Classes.edit',compact('StudentClasses','Grades','Days','Classrooms','Sections','Teachers','Schools','Subjects'));
    }

    public function update(ClassRequest $request)
    {

        try {

            $StudentClass = StudentClass::findOrFail($request->id);
    
            $StudentClass->day_id = strip_tags($request->Day_id);
            $StudentClass->grade_id = strip_tags($request->Grade_id);
            $StudentClass->classroom_id = strip_tags($request->Classroom_id);
            $StudentClass->section_id = strip_tags($request->Section_id);
            $StudentClass->class_id = strip_tags($request->School_id);
            $StudentClass->teacher_id = strip_tags($request->Teacher_id);
            $StudentClass->subject_id = strip_tags($request->Subject_id);
            $StudentClass->create_by = auth()->user()->name;
            $StudentClass->save();

            toastr()->success('تم تعديـل بيانـات جدول الحصـص بنجاح');
    
            return redirect()->route('Classes.index');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        StudentClass::findOrFail($request->id)->delete();
        toastr()->error('تم حذف بيانـات جدول الحصـص بنجاح');
        return redirect()->route('Classes.index');
    }

}
