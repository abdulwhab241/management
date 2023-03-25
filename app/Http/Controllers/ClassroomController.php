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
        return view('pages.Classrooms.empty',compact('My_Classes','Grades'));
    }

    public function store(ClassroomRequest $request)
    {
        $List_Classes = $request->List_Classes;
        try
            {
            $validated = $request->validated();
            foreach ($List_Classes as $list) {
                $My_Classes = new Classroom();
                $My_Classes->name_class = $list['Name'];
                $My_Classes->grade_id = $list['Grade_id'];
                $My_Classes->create_by =  auth()->id();

                $My_Classes->save();
            }
                toastr()->success('تم حفظ الصفوف بنجاح');
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
            $Classrooms->name_class = $request->Name,
            $Classrooms->grade_id = $request->Grade_id,
            $Classrooms->create_by =  auth()->id(),
            ]);
            toastr()->success('تم تعديل الصف بنجاح');
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
        toastr()->error('تم حذف الصف بنجاح');
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
        $Search = Classroom::select('*')->where('Grade_id','=',$request->Grade_id)->get();
        return view('pages.Classrooms.index',compact('Grades'))->withDetails($Search);
    }
}
