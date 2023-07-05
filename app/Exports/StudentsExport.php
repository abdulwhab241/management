<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentsExport implements FromView
{
    public function view(): View
    {
        return view('pages.Students.StudentExcel', [
            'Students' => Student::where('year',date('Y'))->get()
        ]);
    }

}
