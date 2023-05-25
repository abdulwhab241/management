<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\TeacherClass;
use Illuminate\Http\Request;

class TeacherClassesController extends Controller
{
    public function index()
    {
        $Teacher_Classes = TeacherClass::all();
        return view('pages.Teachers.Classes.index', compact('Teacher_Classes'));
    }
}
