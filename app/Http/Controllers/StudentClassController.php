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
        // $Days = Day::all();
        $Classrooms = Classroom::all();
        $Sections = Section::all();
        // $Teachers = Teacher::all();
        // $Schools = SchoolClass::all();
        // $Subjects = Subject::all();
        return view('pages.Classes.add',  compact('Grades','Classrooms','Sections'));
    }

    public function store(ClassRequest $request)
    {
        try
            {
        
                $StudentClasses = new StudentClass();
                $StudentClasses->day = strip_tags($request->Day_id);
                $StudentClasses->grade_id = strip_tags($request->Grade_id);
                $StudentClasses->classroom_id = strip_tags($request->Classroom_id);
                $StudentClasses->section_id = strip_tags($request->Section_id);
                $StudentClasses->first = strip_tags($request->First);
                $StudentClasses->second = strip_tags($request->Second);
                $StudentClasses->third = strip_tags($request->Third);
                $StudentClasses->fourth = strip_tags($request->Fourth);
                $StudentClasses->fifth = strip_tags($request->Fifth);
                $StudentClasses->sixth = strip_tags($request->Sixth);
                $StudentClasses->seventh = strip_tags($request->Seventh);
                $StudentClasses->create_by = auth()->user()->name;

                $StudentClasses->save();
        
                toastr()->success('تم إضافـة بيانـات جدول الحصـص بنجاح');
                return redirect()->route('Classes.add');
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
        // $Days = Day::all();
        $Classrooms = Classroom::all();
        $Sections = Section::all();
        // $Teachers = Teacher::all();
        // $Schools = SchoolClass::all();
        // $Subjects = Subject::all();
        return view('pages.Classes.edit',compact('StudentClasses','Grades','Classrooms','Sections'));
    }

    public function update(ClassRequest $request)
    {

        try {

            $StudentClass = StudentClass::findOrFail($request->id);
    
            $StudentClass->day = strip_tags($request->Day_id);
            $StudentClass->grade_id = strip_tags($request->Grade_id);
            $StudentClass->classroom_id = strip_tags($request->Classroom_id);
            $StudentClass->section_id = strip_tags($request->Section_id);
            $StudentClass->first = strip_tags($request->First);
            $StudentClass->second = strip_tags($request->Second);
            $StudentClass->third = strip_tags($request->Third);
            $StudentClass->fourth = strip_tags($request->Fourth);
            $StudentClass->fifth = strip_tags($request->Fifth);
            $StudentClass->sixth = strip_tags($request->Sixth);
            $StudentClass->seventh = strip_tags($request->Seventh);
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
