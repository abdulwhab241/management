<?php

namespace App\Exports;

use App\Models\MidResult;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MidResultExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MidResult::all();
    }

    public function view(): View
    {
        return view('pages.Mid_Results.MidResultExcel', [
            'MidResults' => MidResult::all()
        ]);
    }
}
