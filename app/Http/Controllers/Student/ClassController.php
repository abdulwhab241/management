<?php

namespace App\Http\Controllers\Student;


use App\Models\StudentClass;
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
        // $StudentClass = StudentClass::with(['Enrollments'])->where('grade_id', auth()->user()->grade_id)
        // ->where('classroom_id',auth()->user()->classroom_id)
        // ->where('section_id',auth()->user()->section_id)
        // ->where('year', date("Y"))
        // ->get();
    
        return view('pages.Students.Class.index',compact('StudentClass'));
    }
}
