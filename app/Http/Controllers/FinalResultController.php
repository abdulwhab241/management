<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinalRequest;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Enrollment;
use App\Models\FinalResult;
use Illuminate\Http\Request;

class FinalResultController extends Controller
{
    public function index()
    {
        $Final_Results = FinalResult::all();
        return view('pages.Final_Result.index', compact('Final_Results'));
    }

    public function create()
    {
        $Students = Enrollment::where('year', date("Y"))->get();
        $Subjects = Subject::all();
        return view('pages.Final_Result.add', compact('Students','Subjects'));
    }

    public function store(FinalRequest $request)
    {
        try {
            // dd($request);
            $classrooms = Student::where('id',strip_tags($request->Student_id))->pluck('classroom_id');

            $Final_Results = new FinalResult();
            $Final_Results->student_id = strip_tags($request->Student_id);
            $Final_Results->subject_id = strip_tags($request->Subject_id);
    
            foreach ($classrooms as $classroom){
                $Final_Results->classroom_id = $classroom;
            }

            $Final_Results->f_total_write = strip_tags($request->F_Write);
            $Final_Results->f_total_number = strip_tags($request->F_Number);
            $Final_Results->s_total_write = strip_tags($request->S_Write);
            $Final_Results->s_total_number = strip_tags($request->S_Number);
            $Final_Results->total = strip_tags($request->Total);
            $Final_Results->year = date('Y');
            $Final_Results->date = date('Y-m-d');
            $Final_Results->create_by = auth()->user()->name;
            $Final_Results->save();

            toastr()->success('تـم إضـافـة نتيـجة الطـالـب النـهائـية بنجـاح');
            return redirect()->route('Finals.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
