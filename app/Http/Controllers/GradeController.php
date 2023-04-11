<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\GradeRequest;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('pages.Grades.index', compact('grades'));
    }

    public function store(GradeRequest $request)
    {
        try
        {
            // $validated = $request->validated();
            $Grade = new Grade();
            $Grade->name = strip_tags($request->Name);
            $Grade->notes = strip_tags($request->Notes);
            $Grade->create_by = auth()->user()->name;

            $Grade->save();
            toastr()->success('تم حفظ المرحلة بنجاح');
            return redirect()->route('Grades.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(GradeRequest $request)
    {
        try
        {
            $validated = $request->validated();
            $Grade = Grade::findOrFail($request->id);
            $Grade->update([
                $Grade->name = strip_tags($request->Name),
                $Grade->notes = strip_tags($request->Notes),
                $Grade->create_by = auth()->user()->name,
            ]);
            toastr()->success('تم تعديل المرحلة بنجاح');
            return redirect()->route('Grades.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        // $Grade = Grade::findOrFail($request->id)->delete(); 
        // toastr()->warning(trans('main_trans.delete'));
        // return redirect()->route('Grades.index');
    $MyClass_id = Classroom::where('grade_id',$request->id)->pluck('grade_id');

    if($MyClass_id->count() == 0){

        $Grades = Grade::findOrFail($request->id)->delete();
        toastr()->error('تم حذف المرحلة بنجاح');
        return redirect()->route('Grades.index');
    }

    else{

        toastr()->warning(' لايمكن حذف المرحلة بسبب وجود صفوف تابعة لها احذف الصفوف ثم احذف المرحلة');
        return redirect()->route('Grades.index');
    }
}
    
}
