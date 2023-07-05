<?php

namespace App\Exports;

use App\Models\FundAccount;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class FundAccountExport implements FromView
{

    public function view(): View
    {
        return view('pages.Boxes.BoxExcel', [
            'Boxes' => FundAccount::where('year',date('Y'))->get()
        ]);
    }
}
