<?php

namespace App\Exports;

use App\Models\PaymentStudent;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PaymentStudentsExport implements FromView
{
    public function view(): View
    {
        return view('pages.Payments.PaymentExcel', [
            'PaymentStudents' => PaymentStudent::where('year',date('Y'))->get()
        ]);
    }
}
