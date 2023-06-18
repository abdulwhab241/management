<?php

namespace App\Http\Controllers\Student;

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
                        ->get();
        $Student_Name = FinalResult::select('*')->where('student_id', auth()->user()->id)
                        ->where('year', date('Y'))
                        ->first();
        return view('pages.Students.Student_Final.index', compact('Final_Results','Student_Name'));
    }
}
