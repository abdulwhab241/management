<?php

namespace App\Exports;

use App\Models\FinalResult;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FinalResultExport implements FromView
{

    public function view(): View
    {
        return view('pages.Final_Result.FinalResultExcel', [
            'FinalResults' => FinalResult::where('year',date('Y'))->get()
        ]);
    }
}
