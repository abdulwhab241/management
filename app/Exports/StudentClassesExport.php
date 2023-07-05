<?php

namespace App\Exports;

use App\Models\StudentClass;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentClassesExport implements FromView
{

    public function view(): View
    {
        return view('pages.Classes.StudentClassExcel', [
            'StudentClasses' => StudentClass::where('year',date('Y'))->get()
        ]);
    }
}
