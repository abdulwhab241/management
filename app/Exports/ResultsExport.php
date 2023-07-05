<?php

namespace App\Exports;

use App\Models\Result;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ResultsExport implements FromView
{

    public function view(): View
    {
        return view('pages.Results.ResultExcel', [
            'Results' => Result::where('year',date('Y'))->get()
        ]);
    }
}
