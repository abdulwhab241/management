<?php

namespace App\Exports;

use App\Models\ProcessingFee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProcessingExport implements FromView
{

    public function view(): View
    {
        return view('pages.ProcessingFee.ProcessingExcel', [
            'ProcessingFees' => ProcessingFee::all()
        ]);
    }
}
