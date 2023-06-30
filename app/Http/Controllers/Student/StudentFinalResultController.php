<?php

namespace App\Http\Controllers\Student;

use App\Models\MidResult;
use App\Models\FinalResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentFinalResultController extends Controller
{
    public function index()
    {
        $Final_Results = FinalResult::select('*')
                        ->where('student_id', auth()->user()->id)
                        ->where('year', date('Y'))
                        ->where('final_status',1)->get();
        $Student_Name = FinalResult::select('*')->where('student_id', auth()->user()->id)
                        ->where('year', date('Y'))
                        ->first();

        $Mid_Results = MidResult::where('student_id', auth()->user()->id)->where('year', date('Y'))->get();
        return view('pages.Students.Student_Final.final', compact('Final_Results','Student_Name','Mid_Results'));
    }

    public function mid_result()
    {
        $Student_Name = MidResult::select('*')->where('student_id', auth()->user()->id)
                        ->where('year', date('Y'))
                        ->first();

        $Mid_Results = MidResult::where('student_id', auth()->user()->id)
                        ->where('year', date('Y'))
                        ->where('mid_status',1)->get();
        return view('pages.Students.Student_Final.mid', compact('Student_Name','Mid_Results'));
    }
}
