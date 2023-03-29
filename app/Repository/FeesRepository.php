<?php


namespace App\Repository;

use App\Models\Fee;
use App\Models\Grade;
use App\Models\Classroom;
use App\Repository\FeesRepositoryInterface;

class FeesRepository implements FeesRepositoryInterface
{

    public function index(){

        $fees = Fee::all();
        $Grades = Grade::all();
        return view('pages.Fees.index',compact('fees','Grades'));

    }

    public function create(){

        $Grades = Grade::all();
        $Classrooms = Classroom::all();
        return view('pages.Fees.add',compact('Grades','Classrooms'));
    }

    public function edit($id){

        $fee = Fee::findOrFail($id);
        $Grades = Grade::all();
        return view('pages.Fees.edit',compact('fee','Grades'));

    }


    public function store($request)
    {
        try {

            $fees = new Fee();
            $fees->title = $request->title;
            $fees->amount  =$request->amount;
            $fees->grade_id  =$request->Grade_id;
            $fees->classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->fee_type  =$request->Fee_type;
            $fees->create_by = auth()->user()->name;
            $fees->save();
            toastr()->success('تم حفظ الرسوم بنجاح');
            return redirect()->route('Fees.create');

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $fees = Fee::findOrFail($request->id);
            $fees->title = $request->title;
            $fees->amount  =$request->amount;
            $fees->grade_id  =$request->Grade_id;
            $fees->classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->fee_type  =$request->Fee_type;
            $fees->create_by = auth()->user()->name;
            $fees->save();
            toastr()->success('تم تعديل الرسوم بنجاح');
            return redirect()->route('Fees.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Fee::destroy($request->id);
            toastr()->error('تم حذف الرسوم بنجاح');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}