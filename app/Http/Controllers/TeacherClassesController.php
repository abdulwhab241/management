<?php

namespace App\Http\Controllers;

use App\Models\TeacherClass;
use Illuminate\Http\Request;

class TeacherClassesController extends Controller
{
    public function index()
    {
        $teacher_classes = TeacherClass::all();
        return view('pages.TeacherClasses.index', compact('teacher_classes'));
    }
}
