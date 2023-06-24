<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\MidResult;
use App\Models\Enrollment;
use App\Http\Requests\MidResultRequest;

class MidResultController extends Controller
{
    public function index()
    {
        $MidResults = MidResult::where('year', date('Y'))->get();
        return view('pages.Mid_Results.index', compact('MidResults'));
    }

    public function create()
    {
        $Students = Enrollment::where('year', date("Y"))->get();
        $Subjects = Subject::all();
        return view('pages.Mid_Results.add', compact('Students','Subjects'));
    }

    public function store(MidResultRequest $request)
    {
        try
        {
            // dd($request);
            $classrooms = Student::where('id',$request->Student_id)->pluck('classroom_id');

            $Total = strip_tags($request->Result) + strip_tags($request->Degree);

            $MidResults = new MidResult();
            $MidResults->student_id = strip_tags($request->Student_id);
            $MidResults->subject_id = strip_tags($request->Subject_id);
            $MidResults->result = strip_tags($request->Result);


            foreach ($classrooms as $classroom){
                $MidResults->classroom_id = $classroom;
            }

            $MidResults->mid_exam = strip_tags($request->Degree);
            $MidResults->total = $Total;
            $MidResults->year = date('Y');
            $MidResults->date = date('Y-m-d');
            $MidResults->create_by = auth()->user()->name;
            $MidResults->save();


            toastr()->success('تم إضـافـة نتيـجة الطـالـب للتـرم الاول بنجاح');
            return redirect()->route('MidResults.create');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
