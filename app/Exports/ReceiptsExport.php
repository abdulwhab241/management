<?php

namespace App\Exports;

use App\Models\ReceiptStudent;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReceiptsExport implements FromView
{
    public function view(): View
    {
        return view('pages.Receipts.ReceiptExcel', [
            'ReceiptStudents' => ReceiptStudent::where('year',date('Y'))->get()
        ]);
    }
}
