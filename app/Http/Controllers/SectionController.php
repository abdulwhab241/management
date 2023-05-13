<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\SectionRequest;

class SectionController extends Controller
{
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        $Classrooms = Classroom::all();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
    
        return view('pages.Sections.index',compact('Grades','list_Grades','Classrooms','teachers'));
    }

    public function store(SectionRequest $request)
    {
        try {

            $validated = $request->validated();
            $Sections = new Section();
    
            $Sections->name_section = strip_tags($request->Name_Section);
            $Sections->grade_id = strip_tags($request->Grade_id);
            $Sections->class_id = strip_tags($request->Class_id);
            $Sections->create_by = auth()->user()->name;
            $Sections->save();
            $Sections->teachers()->attach(strip_tags($request->teacher_id));
            toastr()->success('تم حفظ القسم بنجاح');
            return redirect()->route('Sections.index');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(SectionRequest $request)
    {
        
    try {
        $validated = $request->validated();
        $Sections = Section::findOrFail(strip_tags($request->id));

        $Sections->name_section = strip_tags($request->Name_Section);
        $Sections->grade_id = strip_tags($request->Grade_id);
        $Sections->class_id = strip_tags($request->Class_id);
        $Sections->create_by = auth()->user()->name;

        if (isset($request->teacher_id)) {
            $Sections->teachers()->sync(strip_tags($request->teacher_id));
        } else {
            $Sections->teachers()->sync(array());
        }

        $Sections->save();
        toastr()->success('تم تعديل القسم بنجاح');

        return redirect()->route('Sections.index');
    }
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }

    public function destroy(Request $request)
    {
        Section::findOrFail($request->id)->delete();
        toastr()->error('تم حذف القسم بنجاح');
        return redirect()->route('Sections.index');
    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name_class", "id");

        return $list_classes;
    }
    

}
