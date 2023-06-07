<?php

namespace App\Exports;

use App\Models\StudentClass;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentClassesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StudentClass::all();
    }

    public function view(): View
    {
        return view('pages.Classes.StudentClassExcel', [
            'StudentClasses' => StudentClass::all()
        ]);
    }
}
