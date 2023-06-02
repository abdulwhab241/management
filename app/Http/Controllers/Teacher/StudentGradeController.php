<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Student;
use App\Models\StudentGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentGradeController extends Controller
{
    public function index()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::where('section_id', $ids)->get();
        $Student_Grades = StudentGrade::whereIn('student_id', $students)->get();
        return view('pages.Teachers.dashboard.StudentGrades.index',compact('Student_Grades','students'));
    }
}
