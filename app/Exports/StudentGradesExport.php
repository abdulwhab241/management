<?php

namespace App\Exports;

use App\Models\StudentGrade;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentGradesExport implements FromView
{

    public function view(): View
    {
        return view('pages.Student_Grades.StudentGradeExcel', [
            'StudentGrades' => StudentGrade::where('year',date('Y'))->get()
        ]);
    }
}
