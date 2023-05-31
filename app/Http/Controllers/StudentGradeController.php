<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentGrade;
use Illuminate\Http\Request;

class StudentGradeController extends Controller
{
    public function index()
    {
        $Student_Grades = StudentGrade::all();
        return view('pages.Student_Grades.index', compact('Student_Grades'));
    }

    public function create()
    {
        $Students = Student::all();
        $Semesters = Semester::all();
        return view('pages.Student_Grades.add', compact('Students','Semesters'));
    }
}
