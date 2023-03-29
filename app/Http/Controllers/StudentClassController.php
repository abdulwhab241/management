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
        $List_Classes = $request->List_Classes;
        try
            {
            $validated = $request->validated();
            foreach ($List_Classes as $list) {
                $StudentClasses = new StudentClass();
                $StudentClasses->day_id = $list['Day_id'];
                $StudentClasses->grade_id = $list['Grade_id'];
                $StudentClasses->classroom_id = $list['Classroom_id'];
                $StudentClasses->section_id = $list['Section_id'];
                $StudentClasses->class_id = $list['School_id'];
                $StudentClasses->teacher_id = $list['Teacher_id'];
                $StudentClasses->subject_id = $list['Subject_id'];

                $StudentClasses->save();
            }
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

    public function update(Request $request)
    {

        try {

            $StudentClass = StudentClass::findOrFail($request->id);
    
            $StudentClass->day_id = $request->Day_id;
            $StudentClass->grade_id = $request->Grade_id;
            $StudentClass->classroom_id = $request->Classroom_id;
            $StudentClass->section_id = $request->Section_id;
            $StudentClass->class_id = $request->School_id;
            $StudentClass->teacher_id = $request->Teacher_id;
            $StudentClass->subject_id = $request->Subject_id;
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
