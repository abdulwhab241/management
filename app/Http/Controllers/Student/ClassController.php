<?php

namespace App\Http\Controllers\Student;


use App\Models\StudentClass;
use App\Models\StudentGrade;
use App\Http\Controllers\Controller;


class ClassController extends Controller
{
    public function index()
    {
        $StudentClass = StudentClass::select('*')->where('grade_id', auth()->user()->grade_id)
        ->where('classroom_id',auth()->user()->classroom_id)
        ->where('section_id',auth()->user()->section_id)
        ->where('year', date("Y"))
        ->get();
    
        return view('pages.Students.Class.index',compact('StudentClass'));
    }

    public function student_grades()
    {
        $Student_Grades = StudentGrade::where('year', date('Y'))
                        ->where('student_id',auth()->user()->id)->get();
        return view('pages.Students.Student_Final.degree',compact('Student_Grades'));
    }
}
