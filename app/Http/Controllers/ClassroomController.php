<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\ClassroomRequest;

class ClassroomController extends Controller
{
    public function index()
    {
        $My_Classes = Classroom::all();
        $Grades = Grade::all();
        return view('pages.Classrooms.index',compact('My_Classes','Grades'));
    }

    public function store(ClassroomRequest $request)
    {
        
        try
            {
            $validated = $request->validated();
                $My_Classes = new Classroom();
                $My_Classes->name_class = strip_tags($request->Name);
                $My_Classes->grade_id = strip_tags($request->Grade_id);
                $My_Classes->create_by = auth()->user()->name;

                $My_Classes->save();
            
                toastr()->success('تم حفظ الـصـف بنجاح');
                return redirect()->route('Classrooms.index');
            }
            catch(\Exception $e)
            {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
    }

    public function update(ClassroomRequest $request)
    {
        try
        {
            $validated = $request->validated();
            $Classrooms = Classroom::findOrFail($request->id);
            $Classrooms->update([
            $Classrooms->name_class = strip_tags($request->Name),
            $Classrooms->grade_id = strip_tags($request->Grade_id),
            $Classrooms->create_by = auth()->user()->name,
            ]);
            toastr()->success('تم تعديل الـصـف بنجاح');
            return redirect()->route('Classrooms.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(ClassroomRequest $request)
    {
        $Classrooms = Classroom::findOrFail($request->id)->delete(); 
        toastr()->error('تم حذف الـصـف بنجاح');
        return redirect()->route('Classrooms.index');
    }

    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->warning('تم حذف الصفوف بنجاح');
        return redirect()->route('Classrooms.index');
    }

    public function Filter_Classes(Request $request)
    {
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('grade_id','=',$request->Grade_id)->get();
        return view('pages.Classrooms.index',compact('Grades'))->withDetails($Search);
    }
}
