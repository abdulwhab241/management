<?php

namespace App\Exports;

use App\Models\FeeInvoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FeeInvoicesExport implements FromView
{

    public function view(): View
    {
        return view('pages.Fees_Invoices.FeeInvoiceExcel', [
            'FeeInvoices' => FeeInvoice::where('year',date('Y'))->get()
        ]);
    }

}
