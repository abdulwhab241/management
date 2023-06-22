<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\MidResult;
use App\Models\Enrollment;
use App\Models\StudentGrade;
use Illuminate\Http\Request;
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
        $Student_Grades = StudentGrade::where('year', date("Y"))->get();
        return view('pages.Mid_Results.add', compact('Students','Subjects','Student_Grades'));
    }

    public function store(MidResultRequest $request)
    {
        try
        {
            // dd($request);
            $classrooms = Student::where('id',$request->Student_id)->pluck('classroom_id');

            // $Degree = StudentGrade::where('id',$request->Student_id)-

            $MidResults = new MidResult();
            $MidResults->student_id = strip_tags($request->Student_id);
            $MidResults->subject_id = strip_tags($request->Subject_id);
            $MidResults->student_grade_id = strip_tags($request->Degree_id);


            foreach ($classrooms as $classroom){
                $MidResults->classroom_id = $classroom;
            }

            $MidResults->appreciation = strip_tags($request->Appreciation);
            $MidResults->mid_exam = strip_tags($request->Degree);
            // $MidResults->total = strip_tags($request->Total);
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
