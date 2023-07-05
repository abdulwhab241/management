<?php

namespace App\Http\Controllers;

use App\Models\FundAccount;
use App\Exports\FundAccountExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{


    public function dashboard()
    {
        return view('dashboard');
    }

    public function box()
    {
        $Boxes = FundAccount::where('year',date('Y'))->get();
        return view('pages.Boxes.index',compact('Boxes'));
    }

    public function export() 
    {
        return Excel::download(new FundAccountExport, 'الصندوق.xlsx');
    }

}
