<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\SchoolClass;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $StudentClass = StudentClass::select('*')->where('grade_id', auth()->user()->grade_id)
        ->where('classroom_id',auth()->user()->classroom_id)
        ->where('section_id',auth()->user()->section_id)
        ->get();
    
        return view('pages.Students.Class.index',compact('StudentClass'));
    }
}
