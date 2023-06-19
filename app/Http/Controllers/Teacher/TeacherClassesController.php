<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\TeacherClass;
use Illuminate\Http\Request;

class TeacherClassesController extends Controller
{
    public function index()
    {
        $Teacher_Classes = TeacherClass::select('*')->where('teacher_id', auth()->user()->id)
                                        ->where('year', date('Y'))->get();
        return view('pages.Teachers.Classes.index', compact('Teacher_Classes'));
    }
}
