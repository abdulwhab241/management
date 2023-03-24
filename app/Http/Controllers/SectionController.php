<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\SectionRequest;

class SectionController extends Controller
{
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        return view('pages.Sections.index',compact('Grades','list_Grades'));
    }

    public function store(SectionRequest $request)
    {
        try {

            $validated = $request->validated();
            $Sections = new Section();
    
            $Sections->name_section = $request->Name_Section;
            $Sections->grade_id = $request->Grade_id;
            $Sections->class_id = $request->Class_id;
            $Sections->save();
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
        $Sections = Section::findOrFail($request->id);

        $Sections->name_section = $request->Name_Section;
        $Sections->grade_id = $request->Grade_id;
        $Sections->class_id = $request->Class_id;
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

    public function get_classes($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name_class", "id");

        return $list_classes;
    }
    

}
