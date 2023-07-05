<?php

namespace App\Exports;

use App\Models\MidResult;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MidResultExport implements FromView
{

    public function view(): View
    {
        return view('pages.Mid_Results.MidResultExcel', [
            'MidResults' => MidResult::where('year',date('Y'))->get()
        ]);
    }
}
